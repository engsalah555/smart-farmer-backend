<?php

namespace App\Modules\Marketplace\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Traits\HasStoreScope;

/**
 * نموذج كتالوج المتجر
 *
 * @property int $id
 * @property int $store_id
 * @property string $name
 * @property string|null $description
 * @property string|null $image_url
 * @property int $sort_order
 * @property int|null $products_count  (مُوجَد بواسطة withCount)
 */
class StoreCatalog extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasStoreScope;

    protected $fillable = [
        'store_id',
        'name',
        'slug',
        'description',
        'image_url',
        'sort_order',
        'image',
    ];

    /**
     * Get the catalog image URL.
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

            return asset('storage/' . $path);
        }

        return $this->getFirstMediaUrl('catalog_image') ?: null;
    }

    protected $casts = [
        'sort_order' => 'integer',
    ];

    // =========================================================
    // RELATIONSHIPS
    // =========================================================

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class, 'catalog_id');
    }

    // =========================================================
    // MEDIA COLLECTIONS & CONVERSIONS
    // =========================================================

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('catalog_image')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(200)
            ->sharpen(10)
            ->nonQueued();
    }

    // =========================================================
    // SCOPES
    // =========================================================

    /**
     * Scope: ترتيب الكتالوجات حسب sort_order ثم تاريخ الإنشاء
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }

    // =========================================================
    // BOOT: Slug Generation
    // =========================================================
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($catalog) {
            if (empty($catalog->slug)) {
                $catalog->slug = Str::slug($catalog->name) ?: strtolower(urlencode($catalog->name));
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
