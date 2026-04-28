<?php

namespace App\Modules\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marketplace\OrderRequest;
use App\Modules\Marketplace\Application\Services\MarketplaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

use App\Modules\Marketplace\Domain\Models\Order;

class OrderController extends Controller
{
    use \App\Traits\ApiResponder;

    public function __construct(protected MarketplaceService $marketplaceService) {}

    /**
     * POST /marketplace/orders/{order}/cancel
     */
    public function cancel(Request $request, Order $order): JsonResponse
    {
        try {
            $cancelledOrder = $this->marketplaceService->cancelOrder($order, $request->user()->id);
            return $this->success(new \App\Http\Resources\Marketplace\OrderResource($cancelledOrder), 'تم إلغاء الطلب بنجاح');
        } catch (Exception $e) {
            return $this->error($e->getMessage(), 422);
        }
    }

    /**
     * POST /marketplace/checkout
     */
    public function store(OrderRequest $request): JsonResponse
    {
        try {
            $order = $this->marketplaceService->placeOrder(
                $request->user(),
                $request->validated(),
                $request->file('receipt_image')
            );

            return $this->success(new \App\Http\Resources\Marketplace\OrderResource($order), 'تم إرسال الطلب بنجاح', 201);
        } catch (Exception $e) {
            \Illuminate\Support\Facades\Log::error('Checkout failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => $request->user()->id,
                'data' => $request->all()
            ]);

            return $this->error('حدث خطأ أثناء معالجة الطلب: ' . $e->getMessage(), 500);
        }
    }

    /**
     * GET /marketplace/orders
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->input('per_page', 20);

        $orders = $request->user()
            ->orders()
            ->with(['items.product:id,name,price', 'items.product.media'])
            ->latest()
            ->paginate($perPage);

        \Illuminate\Support\Facades\Log::info('Buyer orders list', [
            'user_id' => $request->user()->id,
            'count' => $orders->count(),
            'total' => $orders->total(),
            'sample_order' => $orders->first() ? (new \App\Http\Resources\Marketplace\OrderResource($orders->first()))->toArray($request) : null,
        ]);

        return $this->paginated($orders, \App\Http\Resources\Marketplace\OrderResource::class);
    }
}
