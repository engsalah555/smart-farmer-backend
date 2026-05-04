<?php

namespace App\Services;

use App\Modules\PlantGuide\Domain\Models\CareGuide;
use App\Models\Category;
use App\Modules\PlantGuide\Domain\Models\Plant;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlantIntegrationService
{
    protected $perenualApiKey;

    protected $huggingFaceApiKey;

    public function __construct()
    {
        $this->perenualApiKey = config('services.perenual.key');
        $this->huggingFaceApiKey = config('services.huggingface.key');
    }

    public function fetchAndStorePlants($page = 1)
    {
        try {
            $response = Http::get('https://perenual.com/api/species-list', [
                'key' => $this->perenualApiKey,
                'page' => $page,
            ]);

            if (! $response->successful()) {
                Log::error('Failed to fetch plants from Perenual: '.$response->body());

                return false;
            }

            $plants = $response->json()['data'];

            // Get or create a default category. Assuming 1 represents 'General'
            $category = Category::firstOrCreate(
                ['name' => 'General'],
                ['description' => 'General plant category', 'icon' => 'leaf']
            );

            foreach ($plants as $plantData) {
                // Fetch detailed information
                $details = $this->fetchPlantDetails($plantData['id']);

                if (! $details) {
                    continue; // Skip if we couldn't fetch details
                }

                // Translate names and description
                $commonNameAr = $this->translateText($details['common_name'] ?? $plantData['common_name']);
                $descriptionEn = $details['description'] ?? 'No description available.';
                $descriptionAr = collect(explode('.', $descriptionEn))
                    ->filter(fn ($sentence) => trim($sentence) !== '')
                    ->map(fn ($sentence) => $this->translateText(trim($sentence).'.'))
                    ->implode(' ');

                // We limit the translation to chunks because HuggingFace API can have length limits.

                $plant = Plant::updateOrCreate(
                    ['scientific_name' => collect($plantData['scientific_name'])->first()],
                    [
                        'category_id' => $category->id,
                        'common_name' => $commonNameAr ?: $plantData['common_name'],
                        'description' => $descriptionAr,
                        'difficulty_level' => $this->translateText(ucfirst($details['care_level'] ?? 'Medium')),
                    ]
                );

                // Fetch thumbnail image if exists
                if (! empty($plantData['default_image']['thumbnail'])) {
                    try {
                        if ($plant->getMedia('images')->count() === 0) {
                            $plant->addMediaFromUrl($plantData['default_image']['thumbnail'])
                                ->toMediaCollection('images');
                        }
                    } catch (\Exception $e) {
                        Log::warning('Failed to store image for plant: '.$plant->id.' Error: '.$e->getMessage());
                    }
                }

                $this->storeCareGuide($plant, $details);

                Log::info('Successfully stored and translated plant: '.$plant->scientific_name);
            }

            return true;
        } catch (\Exception $e) {
            Log::error('Error in fetchAndStorePlants: '.$e->getMessage());

            return false;
        }
    }

    protected function fetchPlantDetails($id)
    {
        $response = Http::get("https://perenual.com/api/species/details/{$id}", [
            'key' => $this->perenualApiKey,
        ]);

        if (! $response->successful()) {
            return null;
        }

        return $response->json();
    }

    protected function storeCareGuide($plant, $details)
    {
        $wateringEn = collect($details['watering_general_benchmark']['value'] ?? [])->first() ?? $details['watering'] ?? 'Regularly';
        $sunlightEn = collect($details['sunlight'] ?? [])->implode(', ') ?: 'Full sun';
        $temperatureEn = collect($details['hardiness'] ?? [])->implode(' to ') ?: 'Room condition';

        $wateringAr = $this->translateText($wateringEn);
        $sunlightAr = $this->translateText($sunlightEn);
        $temperatureAr = 'مناسبة للحرارة: '.$temperatureEn; // hard to translate ranges reliably without context

        CareGuide::updateOrCreate(
            ['plant_id' => $plant->id],
            [
                'watering_schedule' => $wateringAr,
                'sunlight_requirement' => $sunlightAr,
                'temperature' => $temperatureAr,
                'humidity' => 'Average', // Default or translate based on specific needs
            ]
        );
    }

    protected function translateText($text)
    {
        if (empty($text)) {
            return $text;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$this->huggingFaceApiKey}",
            ])->post('https://api-inference.huggingface.co/models/Helsinki-NLP/opus-mt-en-ar', [
                'inputs' => $text,
            ]);

            if ($response->successful()) {
                $result = $response->json();

                return $result[0]['translation_text'] ?? $text;
            }

            Log::warning('HuggingFace Translation Failed: '.$response->body());
        } catch (\Exception $e) {
            Log::error('Translation exception: '.$e->getMessage());
        }

        return $text; // Fallback to english if translation fails
    }
}
