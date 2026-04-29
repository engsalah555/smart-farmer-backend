<?php

namespace App\Http\Middleware;

use App\Modules\Marketplace\Domain\Exceptions\UnauthorizedAccessException;
use App\Modules\Marketplace\Domain\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckStoreOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // 1. Admin passes everything
        if ($user->user_type === 'admin') {
            return $next($request);
        }

        // 2. Must be a seller role
        if (! $user->isSeller()) {
            return response()->json(['message' => 'Unauthorized. Only sellers can access this resource.'], 403);
        }

        // 3. Check store existence
        if (! $user->store) {
            // Allow access to 'my-store' routes so the user can see and setup their store
            if ($request->is('*marketplace/seller/my-store*')) {
                return $next($request);
            }

            return response()->json([
                'success' => false,
                'message' => 'يجب إنشاء متجر أولاً للوصول إلى هذه الموارد.',
            ], 403);
        }

        $storeId = $user->store->id;

        // 3. Check Product Ownership
        $product = $request->route('product') ?? $request->route('id');
        if ($product) {
            $pStoreId = is_object($product) ? $product->store_id : Product::withoutGlobalScopes()
                ->where(function ($q) use ($product) {
                    $q->where('id', $product)
                        ->orWhere('slug', $product)
                        ->orWhere('slug', strtolower(urlencode($product)));
                })
                ->value('store_id');

            if ($pStoreId && $pStoreId !== $storeId) {
                throw new UnauthorizedAccessException('هذا المنتج لا ينتمي لمتجرك.');
            }
        }

        // 4. Check Catalog Ownership
        $catalog = $request->route('catalog');
        if ($catalog) {
            $cStoreId = is_object($catalog) ? $catalog->store_id : DB::table('store_catalogs')
                ->where(function ($q) use ($catalog) {
                    $q->where('id', $catalog)
                        ->orWhere('slug', $catalog)
                        ->orWhere('slug', strtolower(urlencode($catalog)));
                })
                ->value('store_id');

            if ($cStoreId && $cStoreId !== $storeId) {
                throw new UnauthorizedAccessException('هذا الكتالوج لا ينتمي لمتجرك.');
            }
        }

        // 5. Check Order Ownership (For Sellers)
        $order = $request->route('order');
        if ($order) {
            // We check if the order has items from this seller's store
            $orderId = is_object($order) ? $order->id : $order;
            $hasItems = DB::table('order_items')
                ->join('products', 'products.id', '=', 'order_items.product_id')
                ->where('order_items.order_id', $orderId)
                ->where('products.store_id', $storeId)
                ->exists();

            if (! $hasItems) {
                throw new UnauthorizedAccessException('هذا الطلب لا يحتوي على منتجات من متجرك.');
            }
        }

        return $next($request);
    }
}
