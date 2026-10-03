<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\PlantGuide\Domain\Models\Crop;
use App\Modules\PlantGuide\Domain\Models\Plant;
use Illuminate\Database\Seeder;

class FarmCropSeeder extends Seeder
{
    public function run(): void
    {
        $farmer = User::where('email', 'farmer@zarah.app')->first();
        $dhamarFarmer = User::where('email', 'dhamar.farmer@zarah.app')->first();
        $testFarmer = User::where('email', 'test@example.com')->first();

        if (! $farmer && ! $testFarmer) {
            return;
        }

        $coffeePlant = Plant::where('common_name', 'like', '%البن%')->first();
        $wheatPlant = Plant::where('common_name', 'like', '%القمح%')->first();
        $potatoPlant = Plant::where('common_name', 'like', '%البطاطس%')->first();
        $tomatoPlant = Plant::where('common_name', 'like', '%الطماطم%')->first();
        $pomegranatePlant = Plant::where('common_name', 'like', '%الرمان%')->first();
        $sorghumPlant = Plant::where('common_name', 'like', '%الذرة%')->first();

        $crops = [
            [
                'user_id' => $farmer?->id,
                'plant_id' => $coffeePlant?->id,
                'name' => 'مدرج البن العديني - القطعة الغربية',
                'crop_type' => 'محاصيل نقدية',
                'plantation_date' => now()->subMonths(14),
                'health_status' => 95.0,
                'needs_irrigation' => false,
                'last_irrigation' => now()->subDays(2),
            ],
            [
                'user_id' => $farmer?->id,
                'plant_id' => $pomegranatePlant?->id,
                'name' => 'بستان الرمان الصعداوي - الحوض 2',
                'crop_type' => 'فواكه',
                'plantation_date' => now()->subMonths(8),
                'health_status' => 88.0,
                'needs_irrigation' => true,
                'last_irrigation' => now()->subDays(6),
            ],
            [
                'user_id' => $dhamarFarmer?->id ?? $farmer?->id,
                'plant_id' => $potatoPlant?->id,
                'name' => 'حقل بطاطس ديامنت - قاع جهران',
                'crop_type' => 'خضروات',
                'plantation_date' => now()->subDays(45),
                'health_status' => 91.5,
                'needs_irrigation' => false,
                'last_irrigation' => now()->subDay(),
            ],
            [
                'user_id' => $dhamarFarmer?->id ?? $farmer?->id,
                'plant_id' => $wheatPlant?->id,
                'name' => 'مزرعة القمح البلدي - القطعة الشمالية',
                'crop_type' => 'حبوب',
                'plantation_date' => now()->subDays(60),
                'health_status' => 94.0,
                'needs_irrigation' => true,
                'last_irrigation' => now()->subDays(5),
            ],
            [
                'user_id' => $testFarmer?->id ?? $farmer?->id,
                'plant_id' => $tomatoPlant?->id,
                'name' => 'بيت محمي طماطم هجين - الصوبة 1',
                'crop_type' => 'خضروات',
                'plantation_date' => now()->subDays(30),
                'health_status' => 96.0,
                'needs_irrigation' => false,
                'last_irrigation' => now()->subHours(12),
            ],
            [
                'user_id' => $testFarmer?->id ?? $farmer?->id,
                'plant_id' => $sorghumPlant?->id,
                'name' => 'حقل الذرة البيضاء الصيفية',
                'crop_type' => 'حبوب',
                'plantation_date' => now()->subDays(25),
                'health_status' => 89.0,
                'needs_irrigation' => true,
                'last_irrigation' => now()->subDays(4),
            ],
        ];

        foreach ($crops as $c) {
            if (! $c['user_id']) {
                continue;
            }

            Crop::create($c);
        }
    }
}
