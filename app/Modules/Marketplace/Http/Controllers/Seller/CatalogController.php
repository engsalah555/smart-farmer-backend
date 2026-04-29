<?php

namespace App\Modules\Marketplace\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marketplace\CatalogRequest;
use App\Http\Resources\CatalogResource;
use App\Modules\Marketplace\Application\Services\MarketplaceService;
use App\Modules\Marketplace\Domain\Models\Product;
use App\Modules\Marketplace\Domain\Models\StoreCatalog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __construct(protected MarketplaceService $marketplaceService) {}

    /**
     * GET /marketplace/seller/catalogs
     */
    public function index(Request $request): JsonResponse
    {
        $store = $request->user()->store;
        if (! $store) {
            return response()->json(['success' => false, 'message' => 'المتجر غير موجود'], 404);
        }

        $catalogs = $this->marketplaceService->getSellerCatalogs($store);

        return response()->json([
            'success' => true,
            'data' => CatalogResource::collection($catalogs),
        ]);
    }

    /**
     * POST /marketplace/seller/catalogs
     */
    public function store(CatalogRequest $request): JsonResponse
    {
        $store = $request->user()->store;
        $catalog = $this->marketplaceService->createCatalog($store, $request->validated(), $request->file('image'));

        return $this->success(new CatalogResource($catalog), 'تم إنشاء الكتالوج بنجاح', 201);
    }

    /**
     * POST /marketplace/seller/catalogs/{catalog} (مع _method=PUT)
     */
    public function update(CatalogRequest $request, StoreCatalog $catalog): JsonResponse
    {
        // ملكية الكتالوج يتم التحقق منها عبر Middleware
        $updatedCatalog = $this->marketplaceService->updateCatalog($catalog, $request->validated(), $request->file('image'));

        return $this->success(new CatalogResource($updatedCatalog), 'تم تحديث الكتالوج بنجاح');
    }

    /**
     * DELETE /marketplace/seller/catalogs/{catalog}
     */
    public function destroy(StoreCatalog $catalog): JsonResponse
    {
        $this->marketplaceService->deleteCatalog($catalog);

        return $this->success(null, 'تم حذف الكتالوج بنجاح');
    }

    /**
     * POST /marketplace/seller/catalogs/{catalog}/assign-products
     */
    public function assignProducts(Request $request, StoreCatalog $catalog): JsonResponse
    {
        $request->validate([
            'product_ids' => 'present|array',
            'product_ids.*' => 'exists:products,id',
        ]);

        // يمكن إضافة تحقق إضافي هنا لضمان أن الـ product_ids تنتمي لمتجر التاجر
        $store = $request->user()->store;
        $validProductIds = Product::whereIn('id', $request->product_ids)
            ->where('store_id', $store->id)
            ->pluck('id')
            ->toArray();

        $this->marketplaceService->assignProductsToCatalog($catalog, $validProductIds);

        return $this->success(null, 'تم تحديث المنتجات التابعة للكتالوج بنجاح');
    }
}
