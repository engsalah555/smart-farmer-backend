<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketplaceMetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Units
        $units = [
            'كيلوجرام',
            'جرام',
            'لتر',
            'مل',
            'حبة',
            'كيس',
            'صندوق',
            'طن',
        ];

        foreach ($units as $unit) {
            DB::table('units')->updateOrInsert(
                ['name' => $unit],
                ['label' => $unit, 'created_at' => now(), 'updated_at' => now()]
            );
        }

        // 2. Payment Methods
        $paymentMethods = [
            ['identifier' => 'cash', 'label' => 'نقدي عند الاستلام', 'icon' => 'cash', 'is_active' => true],
            ['identifier' => 'bank_transfer', 'label' => 'تحويل بنكي', 'icon' => 'bank', 'is_active' => true],
            ['identifier' => 'credit_card', 'label' => 'بطاقة ائتمانية', 'icon' => 'card', 'is_active' => true],
            ['identifier' => 'mada', 'label' => 'مدى', 'icon' => 'mada', 'is_active' => true],
            ['identifier' => 'apple_pay', 'label' => 'Apple Pay', 'icon' => 'apple', 'is_active' => true],
            ['identifier' => 'stc_pay', 'label' => 'STC Pay', 'icon' => 'stc', 'is_active' => true],
        ];

        foreach ($paymentMethods as $method) {
            DB::table('payment_methods')->updateOrInsert(
                ['identifier' => $method['identifier']],
                array_merge($method, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
