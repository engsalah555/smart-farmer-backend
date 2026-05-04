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
            ['name' => 'بذور زراعية', 'icon' => 'eco', 'type' => 'marketplace', 'description' => 'بذور نباتات ومحاصيل متنوعة وتقاوي'],
            ['name' => 'أسمدة', 'icon' => 'opacity', 'type' => 'marketplace', 'description' => 'أسمدة تربة عضوية وكيميائية ومخصبات'],
            ['name' => 'مبيدات زراعية', 'icon' => 'bug_report', 'type' => 'marketplace', 'description' => 'مبيدات حشرية وفطرية ووقائية'],
            ['name' => 'أنظمة ري وطاقة', 'icon' => 'water_drop', 'type' => 'marketplace', 'description' => 'مواسير، غطاسات، ومنظومات طاقة شمسية'],
            ['name' => 'معدات وأدوات', 'icon' => 'tools', 'type' => 'marketplace', 'description' => 'أدوات ومعدات زراعية يدوية وآلية'],
            ['name' => 'مشاتل', 'icon' => 'landscape', 'type' => 'marketplace', 'description' => 'شتلات، أشجار مثمرة، ونباتات زينة'],
            ['name' => 'منتجات زراعية', 'icon' => 'shopping_basket', 'type' => 'marketplace', 'description' => 'محاصيل ومنتجات زراعية طازجة'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['name' => $cat['name'], 'type' => 'marketplace'],
                $cat
            );
        }
    }
}
