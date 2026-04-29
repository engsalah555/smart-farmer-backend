<?php

namespace App\Modules\Marketplace\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * نموذج المتجر
 *
 * @property int $id
 * @property int $user_id
 * @property string $store_name
 * @property string $store_type
 * @property string|null $description
 * @property string|null $address
 * @property float|null $latitude
 * @property float|null $longitude
 * @property int|null $products_count (مُوجَد بواسطة withCount)
 * @property int|null $catalogs_count (مُوجَد بواسطة withCount)
 *
 * - [x] تهيئة البنية التحتية للوسائط
 * - [x] تشغيل Migration جدول الـ `media`
 * - [x] تحديث الموديلات (`Store`, `StoreCatalog`, `Product`) لدعم `MediaLibrary`
 * - [x] تعريف تحويلات الصور (Thumbnails) للأداء
 */
class Store extends Model implements HasMedia
{
    use InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'user_id',
        'store_name',
        'slug',
        'store_type',
        'description',
        'address',
        'latitude',
        'longitude',
        'status',
        'cover',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    // =========================================================
    // RELATIONSHIPS
    // =========================================================

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'store_id');
    }

    public function reviews(): HasManyThrough
    {
        return $this->hasManyThrough(ProductReview::class, Product::class);
    }

    // =========================================================
    // MEDIA COLLECTIONS & CONVERSIONS
    // =========================================================

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // queued() — conversions run in background via the queue worker,
        // preventing the HTTP response from being blocked during image processing.
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10)
            ->queued();

        $this->addMediaConversion('optimized')
            ->width(1200)
            ->height(400)
            ->sharpen(10)
            ->queued();
    }

    /**
     * الكتالوجات مرتّبة تلقائياً حسب sort_order ثم تاريخ الإنشاء
     */
    public function catalogs(): HasMany
    {
        return $this->hasMany(StoreCatalog::class)->orderBy('sort_order')->orderBy('created_at');
    }

    // =========================================================
    // BOOT: Slug Generation
    // =========================================================
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($store) {
            if (empty($store->slug)) {
                $store->slug = Str::slug($store->store_name) ?: strtolower(urlencode($store->store_name));
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // =========================================================
    // SCOPES
    // =========================================================

    /**
     * Scope to order stores by distance from a given point.
     * Uses the Haversine formula.
     */
    public function scopeNearestTo($query, $latitude, $longitude)
    {
        // 6371 is the radius of the earth in kilometers
        $haversine = '(6371 * acos(cos(radians(?)) 
                        * cos(radians(latitude)) 
                        * cos(radians(longitude) - radians(?)) 
                        + sin(radians(?)) 
                        * sin(radians(latitude))))';

        return $query->select('stores.*')
            ->selectRaw("{$haversine} AS distance", [$latitude, $longitude, $latitude])
            ->orderBy('distance');
    }

    // =========================================================
    // ACCESSORS
    // =========================================================

    /**
     * متوسط تقييم المتجر محسوب من منتجاته الفعلية.
     * لا يُخزَّن في قاعدة البيانات لضمان الدقة الدائمة.
     */
    public function getAvgRatingAttribute(): float
    {
        // استخدام القيمة المحملة مسبقاً عبر withAvg لتجنب استعلامات N+1
        if (array_key_exists('reviews_avg_rating', $this->attributes)) {
            return round((float) $this->attributes['reviews_avg_rating'], 1);
        }

        // يُحسب من متوسطات تقييمات المنتجات (Fallback)
        $avg = \DB::table('product_reviews')
            ->join('products', 'products.id', '=', 'product_reviews.product_id')
            ->where('products.store_id', $this->id)
            ->avg('product_reviews.rating');

        return round((float) ($avg ?? 0), 1);
    }

    /**
     * ✅ Get the store logo URL — يعود بصورة المستخدم (توحيد الهوية).
     */
    public function getLogoUrlAttribute(): ?string
    {
        // تم توحيد الهوية بين البائع والمتجر، لذا نستخدم صورة الملف الشخصي للمستخدم
        if ($this->relationLoaded('user') && $this->user) {
            return $this->user->getProfilePhotoUrlAttribute();
        }

        // إذا لم يكن اليوزر محملاً (Fallback)
        $user = User::find($this->user_id);

        return $user ? $user->getProfilePhotoUrlAttribute() : null;
    }

    /**
     * ✅ Get the store cover image URL — MediaLibrary أولاً، ثم العمود المباشر.
     */
    public function getCoverUrlAttribute(): ?string
    {
        $mediaUrl = $this->getFirstMediaUrl('cover', 'optimized') ?: $this->getFirstMediaUrl('cover');
        if ($mediaUrl) {
            return $mediaUrl;
        }

        $cover = $this->attributes['cover'] ?? null;
        if (! $cover) {
            return null;
        }

        if (filter_var($cover, FILTER_VALIDATE_URL)) {
            return $cover;
        }

        $path = ltrim($cover, '/');

        return str_starts_with($path, 'storage/')
            ? url($path)
            : url('storage/'.$path);
    }
}
