<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RealDataSeeder extends Seeder
{
    /**
     * Run the complete real dataset seeding process.
     */
    public function run(): void
    {
        $this->command->info('🌾 بدء تعبئة البيانات الحقيقية والصور لمنصة زرعة (Smart Farmer)...');

        $this->call([
            MarketplaceCategorySeeder::class,
            MarketplaceMetadataSeeder::class,
            UserSeeder::class,
            MarketplaceStoreSeeder::class,
            MarketplaceProductSeeder::class,
            YemeniPlantGuideSeeder::class,
            FarmCropSeeder::class,
            CommunitySeeder::class,
            IotSeeder::class,
            OrderAndReviewSeeder::class,
            WarningSeeder::class,
        ]);

        $this->command->info('✅ تم الانتهاء بنجاح من تعبئة كافة البيانات الواقعية والصور وتحديث الروابط.');
    }
}
