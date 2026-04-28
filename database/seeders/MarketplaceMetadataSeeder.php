<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketplaceMetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Units
        $units = [
            'كيلوجرام', 'جرام', 'لتر', 'مل', 'حبة', 'كيس', 'صندوق', 'طن',
        ];

        foreach ($units as $unit) {
            \DB::table('units')->updateOrInsert(
                ['name' => $unit],
                ['label' => $unit, 'created_at' => now(), 'updated_at' => now()]
            );
        }

        // 2. Payment Methods
        $paymentMethods = [
            ['identifier' => 'cash', 'label' => 'نقدي عند الاستلام', 'icon' => 'cash'],
            ['identifier' => 'bank_transfer', 'label' => 'تحويل بنكي', 'icon' => 'bank'],
            ['identifier' => 'credit_card', 'label' => 'بطاقة ائتمانية', 'icon' => 'card'],
            ['identifier' => 'mada', 'label' => 'مدى', 'icon' => 'mada'],
            ['identifier' => 'apple_pay', 'label' => 'Apple Pay', 'icon' => 'apple'],
            ['identifier' => 'stc_pay', 'label' => 'STC Pay', 'icon' => 'stc'],
        ];

        foreach ($paymentMethods as $method) {
            \DB::table('payment_methods')->updateOrInsert(
                ['identifier' => $method['identifier']],
                array_merge($method, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
