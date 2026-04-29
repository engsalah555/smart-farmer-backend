<?php

namespace App\Modules\Marketplace\Domain\Models;

use App\Traits\HasStoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * نموذج المنتج
 *
 * @property int $id
 * @property int $store_id
 * @property int|null $catalog_id
 * @property string $name
 * @property string|null $description
 * @property float $price
 * @property string $unit
 * @property int $stock_quantity
 * @property float|null $reviews_avg_rating (مُوجَد بواسطة withAvg)
 * @property int|null $reviews_count (مُوجَد بواسطة withCount)
 */
class Product extends Model implements HasMedia
{
    use HasStoreScope, InteractsWithMedia, SoftDeletes;

    /**
     * لا نستخدم $appends لتجنب N+1 Queries.
     * avg_rating و reviews_count تُحسب عبر withAvg/withCount في الـ Service.
     */
    protected $fillable = [
        'store_id',
        'catalog_id',
        'category',
        'name',
        'slug',
        'description',
        'price',
        'unit',
        'stock_quantity',
        'is_featured',
        'image_url',
        'image',
    ];

    protected $casts = [
        'price' => 'float',
        'stock_quantity' => 'integer',
        'is_featured' => 'boolean',
    ];

    // =========================================================
    // RELATIONSHIPS
    // =========================================================

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(StoreCatalog::class, 'catalog_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    // =========================================================
    // MEDIA COLLECTIONS & CONVERSIONS
    // =========================================================

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main_image')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        // queued() — thumbnails are generated in background, not during the upload HTTP request
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->sharpen(10)
            ->queued();

        $this->addMediaConversion('large')
            ->width(800)
            ->height(800)
            ->sharpen(10)
            ->queued();
    }

    // =========================================================
    // ACCESSORS — ذكية: تستخدم القيم المـ Pre-loaded إن وُجدت
    // =========================================================

    /**
     * متوسط التقييم.
     * إذا استُخدم withAvg('reviews', 'rating') → لا query إضافية.
     * وإلا → query واحدة احتياطية.
     */
    public function getAvgRatingAttribute(): float
    {
        if (array_key_exists('reviews_avg_rating', $this->attributes)) {
            return round((float) $this->attributes['reviews_avg_rating'], 1);
        }

        return round((float) ($this->reviews()->avg('rating') ?? 0), 1);
    }

    /**
     * عدد التقييمات.
     * إذا استُخدم withCount('reviews') → لا query إضافية.
     */
    public function getReviewsCountAttribute(): int
    {
        if (array_key_exists('reviews_count', $this->attributes)) {
            return (int) $this->attributes['reviews_count'];
        }

        return $this->reviews()->count();
    }

    /**
     * Get the product image URL.
     * Priority: image_url column > main_image media collection.
     */
    public function getImageUrlAttribute($value)
    {
        if ($value) {
            if (filter_var($value, FILTER_VALIDATE_URL)) {
                return $value;
            }

            $path = ltrim($value, '/');
            if (str_starts_with($path, 'storage/')) {
                return asset($path);
            }

            return asset('storage/'.$path);
        }

        // Always fallback to Spatie MediaLibrary if column is empty
        return $this->getFirstMediaUrl('main_image') ?: null;
    }

    // =========================================================
    // SCOPES
    // =========================================================

    // Handled by HasStoreScope trait

    /**
     * Scope: منتجات كتالوج معين (null = غير مُصنّف)
     */
    public function scopeForCatalog(Builder $query, ?int $catalogId): Builder
    {
        return $catalogId === null
            ? $query->whereNull('catalog_id')
            : $query->where('catalog_id', $catalogId);
    }

    /**
     * Scope: المنتجات المتوفرة في المخزون
     */
    public function scopeInStock(Builder $query): Builder
    {
        return $query->where('stock_quantity', '>', 0);
    }

    /**
     * Scope: المنتجات المميزة
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    // =========================================================
    // BOOT: Slug Generation
    // =========================================================
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name) ?: strtolower(urlencode($product->name));
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
