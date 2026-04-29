<?php

namespace App\Modules\Marketplace\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marketplace\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Modules\Marketplace\Application\Services\MarketplaceService;
use App\Modules\Marketplace\Domain\Exceptions\BusinessLogicException;
use App\Modules\Marketplace\Domain\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected MarketplaceService $marketplaceService) {}

    /**
     * GET /marketplace/seller/products
     */
    public function index(Request $request): JsonResponse
    {
        $store = $request->user()->store;
        $perPage = (int) $request->input('per_page', 20);
        $catalogId = $request->filled('catalog_id') ? (int) $request->catalog_id : null;

        $products = $this->marketplaceService->getStoreProducts($store, $catalogId, $perPage);

        return $this->paginated($products, ProductResource::class);
    }

    /**
     * POST /marketplace/seller/products
     */
    public function store(ProductRequest $request): JsonResponse
    {
        $store = $request->user()->store;

        // التحقق أن catalog_id ينتمي لنفس المتجر (هذا التحقق منطقي للبقاء هنا)
        if ($request->filled('catalog_id')) {
            if (! $store->catalogs()->where('id', $request->catalog_id)->exists()) {
                return $this->error('الكتالوج المحدد لا ينتمي لمتجرك', 422);
            }
        }

        $product = $this->marketplaceService->createProduct(
            $store,
            $request->validated(),
            $request->file('image'),
            $request->file('other_images') ?? []
        );

        return $this->success(new ProductResource($product), 'تمت إضافة المنتج بنجاح', 201);
    }

    /**
     * POST /marketplace/seller/products-update/{id}
     */
    public function update(ProductRequest $request, string $id): JsonResponse
    {
        $product = Product::withoutGlobalScopes()->where('id', $id)->orWhere('slug', $id)->firstOrFail();
        $store = $request->user()->store;

        // التحقق من الكتالوج فقط، أما ملكية المنتج فيفحصها الـ Middleware
        if ($request->filled('catalog_id')) {
            if (! $store->catalogs()->where('id', $request->catalog_id)->exists()) {
                throw new BusinessLogicException('الكتالوج المحدد لا ينتمي لمتجرك');
            }
        }

        $updatedProduct = $this->marketplaceService->updateProduct(
            $product,
            $request->validated(),
            $request->file('image'),
            $request->file('other_images') ?? []
        );

        return $this->success(new ProductResource($updatedProduct), 'تم تعديل المنتج بنجاح');
    }

    /**
     * DELETE /marketplace/seller/products/{product}
     */
    public function destroy(Product $product): JsonResponse
    {
        // ملكية المنتج يفحصها الـ Middleware "store_owner"
        $this->marketplaceService->deleteProduct($product);

        return $this->success(null, 'تم حذف المنتج بنجاح');
    }
}
