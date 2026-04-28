<?php

namespace App\Modules\Marketplace\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Marketplace\Domain\Models\Product;
use App\Modules\Marketplace\Domain\Models\ProductReview;
use App\Modules\Marketplace\Domain\Exceptions\BusinessLogicException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * GET /marketplace/products/{product}/reviews
     */
    public function index(Product $product): JsonResponse
    {
        $product->loadAvg('reviews', 'rating')->loadCount('reviews');

        $reviews = $product->reviews()
            ->with('user:id,name,profile_image')
            ->latest()
            ->get();

        return response()->json([
            'success'       => true,
            'avg_rating'    => $product->reviews_avg_rating ?? 0,
            'reviews_count' => $product->reviews_count,
            'data'          => $reviews,
        ]);
    }

    /**
     * POST /marketplace/products/{product}/reviews
     */
    public function store(Request $request, Product $product): JsonResponse
    {
        $request->validate([
            'rating'  => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        $user = $request->user();
        $product->load('store');

        if (!ProductReview::canUserReview($user, $product)) {
            throw new BusinessLogicException('لا يمكنك تقييم منتجاتك الخاصة');
        }

        $review = ProductReview::updateOrCreate(
            ['product_id' => $product->id, 'user_id' => $user->id],
            [
                'rating'  => round((float) $request->rating, 1),
                'comment' => $request->comment,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => $review->wasRecentlyCreated ? 'تم إرسال تقييمك بنجاح' : 'تم تحديث تقييمك بنجاح',
            'data'    => $review->load('user:id,name,profile_image'),
        ], $review->wasRecentlyCreated ? 201 : 200);
    }
}
