<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class MarketplaceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'بذور', 'icon' => 'eco', 'type' => 'marketplace', 'description' => 'بذور نباتات ومحاصيل متنوعة'],
            ['name' => 'أسمدة', 'icon' => 'opacity', 'type' => 'marketplace', 'description' => 'أسمدة تربة عضوية وكيميائية'],
            ['name' => 'مبيدات', 'icon' => 'bug_report', 'type' => 'marketplace', 'description' => 'مبيدات حشرية وفطرية'],
            ['name' => 'محاصيل', 'icon' => 'grass', 'type' => 'marketplace', 'description' => 'محاصيل زراعية طازجة'],
            ['name' => 'معدات', 'icon' => 'tools', 'type' => 'marketplace', 'description' => 'أدوات ومعدات زراعية'],
            ['name' => 'مشاتل', 'icon' => 'landscape', 'type' => 'marketplace', 'description' => 'شتلات ونباتات زينة'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['name' => $cat['name'], 'type' => 'marketplace'],
                $cat
            );
        }
    }
}
