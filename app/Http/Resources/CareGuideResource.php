<?php

namespace App\Http\Resources;

use App\Modules\PlantGuide\Domain\Models\CareGuide;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CareGuide
 */
class CareGuideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'watering_schedule' => $this->watering_schedule,
            'sunlight_requirement' => $this->sunlight_requirement,
            'temperature' => $this->temperature,
            'humidity' => $this->humidity,
            'min_temp' => $this->min_temp,
            'max_temp' => $this->max_temp,
            'light_type' => $this->light_type,
            'rainfall' => $this->rainfall,
            'min_humidity' => $this->min_humidity,
            'max_humidity' => $this->max_humidity,
            'irrigation_level' => $this->irrigation_level,
            'life_cycle' => $this->life_cycle,
            'cultivation_method' => $this->cultivation_method,
            'planting_depth' => $this->planting_depth,
            'soil_texture' => $this->soil_texture,
            'min_ph' => $this->min_ph,
            'max_ph' => $this->max_ph,
            'seed_rate' => $this->seed_rate,
            'n_amount' => $this->n_amount,
            'p_amount' => $this->p_amount,
            'k_amount' => $this->k_amount,
            'companion_plants' => $this->companion_plants,
            'combative_plants' => $this->combative_plants,
            'management_tips' => $this->management_tips,
            'succeeding_crops' => $this->succeeding_crops,
            'forbidden_crops' => $this->forbidden_crops,
            'rotation_recommendation' => $this->rotation_recommendation,
            'pests_and_diseases' => $this->pests_and_diseases,
            'harvesting_and_storage' => $this->harvesting_and_storage,
        ];
    }
}
