<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Plant;
use App\Models\CareGuide;
use Illuminate\Support\Str;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CareGuide::truncate();
        Plant::truncate();
        
        $json = file_get_contents(database_path('seeders/yemeni_plants.json'));
        $data = json_decode($json, true);
        $cropCategoryNames = collect($data['categories'])->pluck('name')->toArray();

        Category::whereIn('name', $cropCategoryNames)->delete();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categoryMap = [];
        foreach ($data['categories'] as $catData) {
            $categoryMap[$catData['name']] = Category::create([
                'name' => $catData['name'],
                'type' => 'crop',
                'description' => $catData['description'],
                'icon' => $this->getCategoryIcon($catData['name'])
            ]);
        }

        foreach ($data['plants'] as $p) {
            $categoryId = $categoryMap[$p['category']]->id ?? null;

            // Extract numeric values using regex
            $tempRange = $this->extractRange($p['growing_conditions'] ?? '');
            $phRange = $this->extractRange($p['soil_and_ph'] ?? '');
            
            $plant = Plant::create([
                'category_id' => $categoryId,
                'scientific_name' => $p['scientific_name'] ?? 'N/A',
                'common_name' => $p['common_name'] ?? 'N/A',
                'description' => $p['description'] ?? '',
                'benefits' => $p['benefits'] ?? '-',
                'growth_guide' => $this->generateGrowthGuide($p),
                'difficulty_level' => $p['difficulty_level'] ?? 'متوسط',
                'image_url' => $p['image_url'] ?? '',
                'planting_season' => $p['planting_season'] ?? 'غير محدد',
                'harvest_time' => $p['harvest_time'] ?? 'غير محدد',
            ]);

            $plant->careGuide()->create([
                'watering_schedule' => $p['watering_schedule'] ?? '',
                'sunlight_requirement' => $p['sunlight_requirement'] ?? '',
                'temperature' => $p['temperature'] ?? '',
                'humidity' => $p['humidity'] ?? '',
                
                // Scientific Fields
                'min_temp' => $tempRange['min'] ?? null,
                'max_temp' => $tempRange['max'] ?? null,
                'light_type' => $p['sunlight_requirement'] ?? 'شمس كاملة',
                'rainfall' => $p['water_needs'] ?? 'متوسط',
                'min_humidity' => 40, // Default
                'max_humidity' => 70, // Default
                'irrigation_level' => $p['water_needs'] ?? 'متوسط',
                
                'life_cycle' => $this->guessLifeCycle($p['harvest_time'] ?? ''),
                'cultivation_method' => 'بذر مباشر',
                'planting_depth' => '2-5 سم',
                
                'soil_texture' => Str::before($p['soil_and_ph'] ?? '', '.'),
                'min_ph' => $phRange['min'] ?? 6.0,
                'max_ph' => $phRange['max'] ?? 7.5,
                
                'seed_rate' => '10-15 كجم/هكتار',
                'n_amount' => 80.0,
                'p_amount' => 40.0,
                'k_amount' => 40.0,
                
                'companion_plants' => 'البقوليات، الأعشاب العطرية',
                'combative_plants' => 'الأعشاب الضارة، المحاصيل المنافسة',
                'management_tips' => $p['pests_and_diseases'] ?? 'المراقبة الدورية للآفات',
                
                'succeeding_crops' => 'البقوليات (لتحسين النيتروجين)',
                'forbidden_crops' => 'نفس العائلة النباتية',
                'rotation_recommendation' => 'دورة ثلاثية (حبوب - بقوليات - خضروات)',
            ]);
        }
    }

    private function extractRange($text)
    {
        preg_match_all('/(\d+\.?\d*)/', $text, $matches);
        if (isset($matches[0]) && count($matches[0]) >= 2) {
            return [
                'min' => (float) $matches[0][0],
                'max' => (float) $matches[0][1]
            ];
        }
        return ['min' => null, 'max' => null];
    }

    private function generateGrowthGuide($p)
    {
        return "التعريف العلمي: " . ($p['scientific_definition'] ?? '-') . "\n\n" .
               "ظروف النمو: " . ($p['growing_conditions'] ?? '-') . "\n\n" .
               "التربة والحموضة: " . ($p['soil_and_ph'] ?? '-') . "\n\n" .
               "الآفات والأمراض: " . ($p['pests_and_diseases'] ?? '-') . "\n\n" .
               "الحصاد والتخزين: " . ($p['harvesting_and_storage'] ?? '-');
    }

    private function guessLifeCycle($harvestTime)
    {
        if (Str::contains($harvestTime, ['أيام', 'شهر'])) {
            return 'قصيرة';
        }
        return 'متوسطة';
    }

    private function getCategoryIcon($name)
    {
        $icons = [
            'حبوب' => 'wheat',
            'خضروات' => 'carrot',
            'فواكه' => 'apple',
            'محاصيل نقدية' => 'banknote',
            'أعشاب ونباتات طبية' => 'leaf',
        ];
        return $icons[$name] ?? 'sprout';
    }
}
