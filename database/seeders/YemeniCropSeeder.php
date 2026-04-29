<?php

namespace Database\Seeders;

use App\Models\CropGuide;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class YemeniCropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data to avoid duplicates
        CropGuide::truncate();

        $jsonPath = database_path('seeders/yemeni_plants.json');

        if (! File::exists($jsonPath)) {
            $this->command->error("JSON file not found at: {$jsonPath}");

            return;
        }

        $json = File::get($jsonPath);
        $data = json_decode($json, true);

        if (isset($data['plants'])) {
            foreach ($data['plants'] as $plant) {
                CropGuide::create([
                    'name' => $plant['common_name'] ?? 'بدون اسم',
                    'scientific_name' => $plant['scientific_name'] ?? null,
                    'category' => $plant['category'] ?? 'عام',
                    'description' => $plant['description'] ?? null,
                    'scientific_definition' => $plant['scientific_definition'] ?? null,
                    'growing_conditions' => $plant['growing_conditions'] ?? null,
                    'soil_and_ph' => $plant['soil_and_ph'] ?? null,
                    'benefits' => $plant['benefits'] ?? null,
                    'uses' => $plant['uses'] ?? null,
                    'pests_and_diseases' => $plant['pests_and_diseases'] ?? null,
                    'harvesting_and_storage' => $plant['harvesting_and_storage'] ?? null,
                    'planting_season' => $plant['planting_season'] ?? null,
                    'water_needs' => $plant['water_needs'] ?? null,
                    'fertilizer_needs' => $plant['fertilizer_needs'] ?? null,
                    'harvest_time' => $plant['harvest_time'] ?? null,
                    'watering_schedule' => $plant['watering_schedule'] ?? null,
                    'sunlight_requirement' => $plant['sunlight_requirement'] ?? null,
                    'temperature' => $plant['temperature'] ?? null,
                    'humidity' => $plant['humidity'] ?? null,
                    'image_url' => $plant['image_url'] ?? null,
                ]);
            }
            $this->command->info('Successfully seeded '.count($data['plants']).' crops.');
        } else {
            $this->command->error("No 'plants' data found in JSON.");
        }
    }
}
