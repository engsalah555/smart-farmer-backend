<?php

namespace App\Modules\Marketplace\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Modules\Marketplace\Domain\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductMediaController extends Controller
{
    /**
     * Delete a specific media item from a product.
     * DELETE /marketplace/seller/products/{product}/media/{mediaId}
     */
    public function destroy(Request $request, Product $product, $mediaId): JsonResponse
    {
        // Find the media item
        $media = Media::find($mediaId);

        if (!$media) {
            return $this->error('الصورة غير موجودة', 404);
        }

        // Verify that the media belongs to the product
        if ($media->model_id !== $product->id || $media->model_type !== get_class($product)) {
            return $this->error('هذه الصورة لا تنتمي لهذا المنتج', 403);
        }

        // Verify ownership (the product must belong to the user's store)
        if ($product->store_id !== $request->user()->store->id) {
            return $this->error('غير مصرح لك بحذف صور هذا المنتج', 403);
        }

        $media->delete();

        return $this->success(null, 'تم حذف الصورة بنجاح');
    }
}
