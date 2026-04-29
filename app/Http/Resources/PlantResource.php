<?php

namespace App\Http\Resources;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Plant
 */
class PlantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $imageUrl = $this->resolveImageUrl($this->image_url, 'images');
        $thumbUrl = $this->resolveImageUrl($this->image_url, 'images', 'thumb');

        return [
            'id' => $this->id,
            'scientific_name' => $this->scientific_name,
            'common_name' => $this->common_name,
            'description' => $this->description,
            'benefits' => $this->benefits,
            'growth_guide' => $this->growth_guide,
            'scientific_definition' => $this->scientific_definition,
            'growing_conditions' => $this->growing_conditions,
            'soil_and_ph' => $this->soil_and_ph,
            'uses' => $this->uses,
            'pests_and_diseases' => $this->pests_and_diseases,
            'harvesting_and_storage' => $this->harvesting_and_storage,
            'difficulty_level' => $this->difficulty_level,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'care_guide' => new CareGuideResource($this->whenLoaded('careGuide')),
            'planting_season' => $this->planting_season,
            'water_needs' => $this->water_needs,
            'harvest_time' => $this->harvest_time,
            'fertilizer_needs' => $this->fertilizer_needs,
            'image_url' => $imageUrl,
            'thumb_url' => $thumbUrl,
        ];
    }

    private function resolveImageUrl(?string $path, string $collection, string $conversion = ''): string
    {
        if ($path) {
            if (filter_var($path, FILTER_VALIDATE_URL)) {
                return $path;
            }

            $cleanPath = ltrim($path, '/');
            if (str_starts_with($cleanPath, 'storage/')) {
                return asset($cleanPath);
            }

            return asset('storage/'.$cleanPath);
        }

        $fallback = 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&q=80';

        return $conversion
            ? ($this->getFirstMediaUrl($collection, $conversion) ?: $fallback)
            : ($this->getFirstMediaUrl($collection) ?: $fallback);
    }
}
