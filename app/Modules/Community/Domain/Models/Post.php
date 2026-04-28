<?php

namespace App\Modules\Community\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image_url',  // مسار/URL الصورة الرئيسي
        'image',      // ✅ عمود موجود في قاعدة البيانات (Filament upload)
        'likes_count',
        'reports_count',
        'is_hidden',
    ];

    protected $casts = [
        'is_hidden'    => 'boolean',
        'likes_count'  => 'integer',
        'reports_count'=> 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function savedBy(): HasMany
    {
        return $this->hasMany(SavedPost::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(PostReport::class);
    }

    /**
     * ✅ يُعيد URL كامل لصورة المنشور دائماً.
     * الأولوية: 1) image_url → 2) image (Filament) → 3) MediaLibrary
     */
    public function getImageUrlAttribute($value): ?string
    {
        // 1) العمود image_url له قيمة
        $resolvedValue = $value ?: ($this->attributes['image'] ?? null);

        if ($resolvedValue && !empty($resolvedValue)) {
            // URL كامل يبدأ بـ http → نُعيده مباشرةً
            if (filter_var($resolvedValue, FILTER_VALIDATE_URL)) {
                return $resolvedValue;
            }

            // مسار نسبي → نبني URL كاملاً
            $path = ltrim($resolvedValue, '/');

            if (str_starts_with($path, 'storage/')) {
                return url($path); // ✅ url('storage/xxx') = http://domain/storage/xxx
            }

            return url('storage/' . $path);
        }

        // ✅ الرجوع إلى MediaLibrary إذا لا يوجد مسار في العمود
        $mediaUrl = $this->getFirstMediaUrl('post_image', 'thumb');
        if ($mediaUrl) return $mediaUrl;

        $mediaUrl = $this->getFirstMediaUrl('post_image');
        return $mediaUrl ?: null;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('post_image')->singleFile();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(300)
            ->performOnCollections('post_image');
    }
}

