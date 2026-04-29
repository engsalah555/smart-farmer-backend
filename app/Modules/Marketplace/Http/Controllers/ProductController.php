<?php

namespace App\Modules\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Modules\Marketplace\Application\Services\MarketplaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected MarketplaceService $productService) {}

    /**
     * GET /marketplace/products
     * جلب المنتجات مع الفلترة والترقيم
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->input('per_page', 20);
        $perPage = max(1, min($perPage, 100));
        $featured = $request->boolean('featured', false);
        $query = $request->input('query');

        $paginated = $this->productService->getAllProducts($perPage, $featured, $query);

        return $this->paginated($paginated, ProductResource::class);
    }
}
