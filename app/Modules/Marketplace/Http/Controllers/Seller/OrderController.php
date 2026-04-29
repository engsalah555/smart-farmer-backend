<?php

namespace App\Modules\Marketplace\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Resources\Marketplace\OrderResource;
use App\Modules\Marketplace\Application\Services\MarketplaceService;
use App\Modules\Marketplace\Domain\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function __construct(protected MarketplaceService $marketplaceService) {}

    /**
     * GET /marketplace/seller/orders
     */
    public function index(Request $request): JsonResponse
    {
        $store = $request->user()->store;
        if (! $store) {
            return response()->json(['success' => false, 'message' => 'المتجر غير موجود'], 404);
        }

        $perPage = (int) $request->input('per_page', 20);
        $paginated = $this->marketplaceService->getStoreOrders($store, $perPage);

        Log::info('Seller orders list', [
            'store_id' => $store->id,
            'user_id' => $request->user()->id,
            'count' => $paginated->count(),
            'total' => $paginated->total(),
            'sample_order' => $paginated->first() ? (new OrderResource($paginated->first()))->toArray($request) : null,
        ]);

        return $this->paginated($paginated, OrderResource::class);
    }

    /**
     * POST /marketplace/seller/orders/{order}/status
     */
    public function updateStatus(Request $request, Order $order): JsonResponse
    {
        // ملكية الطلب يتم التحقق منها عبر Middleware "store_owner"

        $request->validate([
            'status' => 'required|in:pending,confirmed,processing,shipped,delivered,cancelled',
        ]);

        $oldStatus = $order->status;
        $newStatus = $request->status;

        // [SEC-CHECK] منع شحن الطلب إذا كان الدفع بنكي ولم يتم تأكيده
        if (in_array($newStatus, ['shipped', 'delivered']) &&
            $order->payment_method === 'bank_transfer' &&
            $order->payment_status === 'pending') {
            return $this->error('لا يمكن شحن الطلب قبل تأكيد استلام الحوالة البنكية', 422);
        }

        // تنفيذ التحديث
        $order->update(['status' => $newStatus]);

        // [LOGIC] استعادة المخزون إذا ألغي الطلب ولم يكن ملغياً سابقاً
        if ($newStatus === 'cancelled' && $oldStatus !== 'cancelled') {
            $this->marketplaceService->restoreStock($order);
        }

        return $this->success($order->fresh(), 'تم تحديث حالة الطلب بنجاح');
    }
}
