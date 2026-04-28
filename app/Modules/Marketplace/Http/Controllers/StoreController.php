<?php

namespace App\Modules\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\StoreResource;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Modules\Marketplace\Application\Services\MarketplaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\ApiResponder;

class StoreController extends Controller
{
    use ApiResponder;

    public function __construct(protected MarketplaceService $marketplaceService) {}

    /**
     * GET /marketplace/stores
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->input('per_page', 20);
        $query   = $request->input('query');
        $latitude = $request->input('latitude') !== null ? (float) $request->input('latitude') : null;
        $longitude = $request->input('longitude') !== null ? (float) $request->input('longitude') : null;

        $stores  = $this->marketplaceService->getAllStores($perPage, $query, $latitude, $longitude);
        return $this->paginated($stores, StoreResource::class);
    }

    /**
     * GET /marketplace/stores/{slug}
     */
    public function show(string $slug): JsonResponse
    {
        $store = $this->marketplaceService->getPublicStore($slug);

        return response()->json([
            'success' => true,
            'data'    => new StoreResource($store),
        ]);
    }

    /**
     * GET /marketplace/stores/{store}/products
     * Accepts store ID (numeric) OR slug — Flutter sends numeric ID.
     */
    public function products(Request $request, string $storeIdentifier): JsonResponse
    {
        // Support both numeric ID and slug for compatibility with Flutter clients
        $store = Store::where('slug', $storeIdentifier)
            ->orWhere('id', $storeIdentifier)
            ->with(['media'])
            ->withCount('products')
            ->first();

        if (!$store) {
            return response()->json(['success' => false, 'message' => 'المتجر غير موجود'], 404);
        }

        $perPage   = (int) $request->input('per_page', 20);
        $catalogId = $request->input('catalog_id') !== null ? (int) $request->input('catalog_id') : null;

        $paginated = $this->marketplaceService->getStoreProducts($store, $catalogId, $perPage);

        return $this->paginated($paginated, ProductResource::class);
    }
}
