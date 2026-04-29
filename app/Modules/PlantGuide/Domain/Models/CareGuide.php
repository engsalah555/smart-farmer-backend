<?php

namespace App\Modules\PlantGuide\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id',
        'watering_schedule',
        'sunlight_requirement',
        'temperature',
        'humidity',
        'min_temp',
        'max_temp',
        'light_type',
        'rainfall',
        'min_humidity',
        'max_humidity',
        'irrigation_level',
        'life_cycle',
        'cultivation_method',
        'planting_depth',
        'soil_texture',
        'min_ph',
        'max_ph',
        'seed_rate',
        'n_amount',
        'p_amount',
        'k_amount',
        'companion_plants',
        'combative_plants',
        'management_tips',
        'succeeding_crops',
        'forbidden_crops',
        'rotation_recommendation',
        'pests_and_diseases',
        'harvesting_and_storage',
    ];

    /**
     * Casts: JSON arrays for plant lists, floats for numeric ranges.
     * Required for Filament TagsInput to read/write as PHP arrays.
     */
    protected $casts = [
        'companion_plants' => 'array',
        'combative_plants' => 'array',
        'succeeding_crops' => 'array',
        'forbidden_crops' => 'array',
        'min_temp' => 'float',
        'max_temp' => 'float',
        'min_humidity' => 'float',
        'max_humidity' => 'float',
        'min_ph' => 'float',
        'max_ph' => 'float',
        'n_amount' => 'float',
        'p_amount' => 'float',
        'k_amount' => 'float',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
