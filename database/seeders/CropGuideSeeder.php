<?php

namespace Database\Seeders;

use App\Modules\PlantGuide\Domain\Models\CropGuide;
use Illuminate\Database\Seeder;

class CropGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guides = [
            [
                'name' => 'الطماطم',
                'scientific_name' => 'Solanum lycopersicum',
                'description' => 'الطماطم من الخضروات الأساسية، سريعة النمو وتنتج محصول وفير إذا توافرت لها أشعة الشمس المباشرة.',
                'planting_season' => 'الربيع والخريف',
                'water_needs' => 'منتظم (يومياً في الصيف ومراعاة جفاف سطح التربة)',
                'fertilizer_needs' => 'سماد عضوي متوازن كل أسبوعين',
                'harvest_time' => '60-80 يوم',
                'image_url' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'النعناع',
                'scientific_name' => 'Mentha',
                'description' => 'عشبة عطرية قوية الانتشار. من الأفضل زراعتها في وعاء منعزل لتجنب طغيانها على باقي النباتات.',
                'planting_season' => 'طوال العام',
                'water_needs' => 'رطبة باستمرار ولكن بدون إغراق',
                'fertilizer_needs' => 'سماد نيتروجيني خفيف شهرياً',
                'harvest_time' => 'مستمر',
                'image_url' => 'https://images.unsplash.com/photo-1628556270448-46f004d5e946?auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'الخيار',
                'scientific_name' => 'Cucumis sativus',
                'description' => 'الخيار نبات متسلق يحب الرطوبة العالية ويحتاج لدعامات (تعريشة) للنمو السليم.',
                'planting_season' => 'الربيع والصيف',
                'water_needs' => 'وفير للتربة والأوراق بسبب حبه للرطوبة',
                'fertilizer_needs' => 'سماد غني بالبوتاسيوم عند التزهير',
                'harvest_time' => '50-70 يوم',
                'image_url' => 'https://images.unsplash.com/photo-1449300079323-02e209d9d3a6?auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'الفلفل البارد',
                'scientific_name' => 'Capsicum annuum',
                'description' => 'الفلفل الحلو غني بالفيتامينات ويحتاج لجو دافئ وشمس ممتازة لنمو الثمار.',
                'planting_season' => 'الربيع',
                'water_needs' => 'معتدل مع الحفاظ على رطوبة التربة',
                'fertilizer_needs' => 'سماد سائل كل 10 أيام',
                'harvest_time' => '65-90 يوم',
                'image_url' => 'https://images.unsplash.com/photo-1566114169558-45d2ff90994a?auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'الخس',
                'scientific_name' => 'Lactuca sativa',
                'description' => 'محصول ورقي سريع النمو، يفضل الأجواء المعتدلة والباردة لتجنب الطعم المر.',
                'planting_season' => 'الخريف والشتاء',
                'water_needs' => 'ري خفيف ومنتظم للحفاظ على هشاشة الأوراق',
                'fertilizer_needs' => 'سماد عضوي خفيف قبل الزراعة',
                'harvest_time' => '40-60 يوم',
                'image_url' => 'https://images.unsplash.com/photo-1622206141540-584456a8c0a5?auto=format&fit=crop&q=80',
            ],
            [
                'name' => 'الجرجير',
                'scientific_name' => 'Eruca sativa',
                'description' => 'نبات ورقي سهل الزراعة جداً، غني بالحديد، ينمو بسرعة كبيرة في معظم أنواع التربة.',
                'planting_season' => 'طوال العام (يفضل الشتاء)',
                'water_needs' => 'يومي ومنتظم',
                'fertilizer_needs' => 'لا يحتاج في التربة الغنية',
                'harvest_time' => '20-30 يوم',
                'image_url' => 'https://images.unsplash.com/photo-1549419134-93e115049b81?auto=format&fit=crop&q=80',
            ],
        ];

        foreach ($guides as $guide) {
            CropGuide::create($guide);
        }
    }
}
