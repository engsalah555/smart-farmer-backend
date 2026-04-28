<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketplaceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'بذور', 'icon' => 'seeds', 'type' => 'marketplace', 'description' => 'بذور نباتات ومحاصيل متنوعة'],
            ['name' => 'اسمدة', 'icon' => 'fertilizer', 'type' => 'marketplace', 'description' => 'أسمدة تربة عضوية وكيميائية'],
            ['name' => 'مبيدات', 'icon' => 'pest', 'type' => 'marketplace', 'description' => 'مبيدات حشرية وفطرية'],
            ['name' => 'محاصيل', 'icon' => 'harvest', 'type' => 'marketplace', 'description' => 'محاصيل زراعية طازجة'],
            ['name' => 'معدات', 'icon' => 'tools', 'type' => 'marketplace', 'description' => 'أدوات ومعدات زراعية'],
            ['name' => 'المشاتل', 'icon' => 'nursery', 'type' => 'marketplace', 'description' => 'شتلات ونباتات زينة'],
        ];

        foreach ($categories as $cat) {
            \App\Models\Category::updateOrCreate(
                ['name' => $cat['name'], 'type' => 'marketplace'],
                $cat
            );
        }
    }
}
