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
            ['name' => 'نحل وعسل', 'icon' => 'hive', 'type' => 'marketplace', 'description' => 'تربية النحل ومنتجات العسل'],
            ['name' => 'مواشي وأعلاف', 'icon' => 'pets', 'type' => 'marketplace', 'description' => 'تربية المواشي والأعلاف المركزة'],
            ['name' => 'طاقة شمسية', 'icon' => 'wb_sunny', 'type' => 'marketplace', 'description' => 'منظومات الطاقة الشمسية والري'],
            ['name' => 'خدمات زراعية', 'icon' => 'engineering', 'type' => 'marketplace', 'description' => 'استشارات وخدمات زراعية تخصصية'],
            ['name' => 'متنوع', 'icon' => 'category', 'type' => 'marketplace', 'description' => 'منتجات زراعية متنوعة'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['name' => $cat['name'], 'type' => 'marketplace'],
                $cat
            );
        }
    }
}
