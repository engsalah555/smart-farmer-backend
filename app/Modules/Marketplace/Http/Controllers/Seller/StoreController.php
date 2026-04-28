<?php

namespace App\Modules\Marketplace\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Marketplace\StoreUpdateRequest;
use App\Http\Resources\StoreResource;
use App\Modules\Marketplace\Application\Services\MarketplaceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct(protected MarketplaceService $marketplaceService) {}

    /**
     * GET /marketplace/seller/my-store
     */
    public function show(Request $request): JsonResponse
    {
        $store = $this->marketplaceService->getSellerStore($request->user());

        if (!$store) {
            return response()->json(['success' => false, 'message' => 'المتجر غير موجود'], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => new StoreResource($store),
        ]);
    }

    /**
     * POST /marketplace/seller/my-store/update
     */
    public function update(StoreUpdateRequest $request): JsonResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        $store = $user->store;
        
        $updatedStore = $this->marketplaceService->updateStore(
            $store,
            $request->validated(),
            $request->file('cover_image')
        );

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث بيانات المتجر بنجاح',
            'data'    => new StoreResource($updatedStore),
        ]);
    }
}
