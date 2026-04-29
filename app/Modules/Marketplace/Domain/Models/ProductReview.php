<?php

namespace App\Modules\Marketplace\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * نموذج تقييم المنتج
 *
 * قواعد التقييم:
 * - المشتري فقط يستطيع التقييم
 * - البائع لا يستطيع تقييم منتجاته
 * - مستخدم واحد = تقييم واحد لكل منتج (unique constraint في DB)
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property float $rating (1.0 - 5.0)
 * @property string|null $comment
 */
class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'comment',
    ];

    protected $casts = [
        'rating' => 'float',
    ];

    // =========================================================
    // RELATIONSHIPS
    // =========================================================

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // =========================================================
    // AUTHORIZATION HELPERS
    // =========================================================

    /**
     * التحقق من أن المستخدم مؤهل لتقييم هذا المنتج.
     * القاعدة: يجب أن يكون مشترياً وليس صاحب المتجر.
     *
     * @param  \App\Models\Product  $product
     */
    public static function canUserReview(User $user, Product $product): bool
    {
        // البائع لا يستطيع تقييم منتجاته
        if ($user->user_type === 'seller') {
            // هل هذا المنتج ينتمي لمتجره؟
            if ($product->store && $product->store->user_id === $user->id) {
                return false;
            }
        }

        return true;
    }
}
