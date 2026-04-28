<?php

namespace App\Modules\PlantGuide\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'scientific_name',
        'category',
        'description',
        'scientific_definition',
        'growing_conditions',
        'soil_and_ph',
        'benefits',
        'uses',
        'pests_and_diseases',
        'harvesting_and_storage',
        'planting_season',
        'water_needs',
        'fertilizer_needs',
        'harvest_time',
        'watering_schedule',
        'sunlight_requirement',
        'temperature',
        'humidity',
        'image_url',
    ];
}
