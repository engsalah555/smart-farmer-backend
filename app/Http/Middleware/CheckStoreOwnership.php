<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Modules\Marketplace\Domain\Exceptions\UnauthorizedAccessException;

class CheckStoreOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // 1. Admin passes everything
        if ($user->user_type === 'admin') {
            return $next($request);
        }

        // 2. Must be a seller with a store to access management routes
        if (!$user->isSeller()) {
            return response()->json(['message' => 'Unauthorized. Only store owners can access this resource.'], 403);
        }

        $storeId = $user->store->id;

        // 3. Check Product Ownership
        $product = $request->route('product');
        if ($product) {
            $pStoreId = is_object($product) ? $product->store_id : \DB::table('products')
                ->where('id', $product)
                ->orWhere('slug', $product)
                ->value('store_id');

            if ($pStoreId && $pStoreId !== $storeId) {
                throw new UnauthorizedAccessException("هذا المنتج لا ينتمي لمتجرك.");
            }
        }

        // 4. Check Catalog Ownership
        $catalog = $request->route('catalog');
        if ($catalog) {
            $cStoreId = is_object($catalog) ? $catalog->store_id : \DB::table('store_catalogs')
                ->where('id', $catalog)
                ->orWhere('slug', $catalog)
                ->value('store_id');

            if ($cStoreId && $cStoreId !== $storeId) {
                throw new UnauthorizedAccessException("هذا الكتالوج لا ينتمي لمتجرك.");
            }
        }

        // 5. Check Order Ownership (For Sellers)
        $order = $request->route('order');
        if ($order) {
            // We check if the order has items from this seller's store
            $orderId = is_object($order) ? $order->id : $order;
            $hasItems = \DB::table('order_items')
                ->join('products', 'products.id', '=', 'order_items.product_id')
                ->where('order_items.order_id', $orderId)
                ->where('products.store_id', $storeId)
                ->exists();

            if (!$hasItems) {
                throw new UnauthorizedAccessException("هذا الطلب لا يحتوي على منتجات من متجرك.");
            }
        }

        return $next($request);
    }
}
