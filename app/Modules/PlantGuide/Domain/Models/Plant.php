<?php

namespace App\Modules\PlantGuide\Domain\Models;

use Database\Factories\PlantFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Plant extends Model implements HasMedia
{
    /** @use HasFactory<PlantFactory> */
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'scientific_name',
        'scientific_definition',
        'common_name',
        'description',
        'benefits',
        'growth_guide',
        'growing_conditions',
        'soil_and_ph',
        'uses',
        'pests_and_diseases',
        'harvesting_and_storage',
        'difficulty_level',
        'image_url',
        'planting_season',
        'water_needs',
        'harvest_time',
        'fertilizer_needs',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function careGuide(): HasOne
    {
        return $this->hasOne(CareGuide::class);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->nonQueued();
    }
}
