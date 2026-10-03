<?php

namespace Database\Seeders;

use App\Models\User;
use App\Modules\Iot\Domain\Models\IotDevice;
use App\Modules\Iot\Domain\Models\IrrigationLog;
use App\Modules\Iot\Domain\Models\IrrigationSchedule;
use Illuminate\Database\Seeder;

class IotSeeder extends Seeder
{
    public function run(): void
    {
        $farmer = User::where('email', 'farmer@zarah.app')->first();
        $testUser = User::where('email', 'test@example.com')->first();
        $dhamarFarmer = User::where('email', 'dhamar.farmer@zarah.app')->first();

        $devices = [
            [
                'user' => $farmer,
                'device_id' => 'IOT-ZARAH-SN01',
                'name' => 'متحكم الري الذكي ومستشعر التربة - مدرج البن (حراز)',
                'status' => 'active',
                'is_irrigation_on' => false,
                'auto_irrigation' => true,
                'water_consumption' => 2450.75,
                'temperature' => 22.8,
                'humidity' => 55.0,
                'soil_moisture' => 62.5,
                'water_level' => 88.0,
                'rain_level' => 0.0,
                'schedules' => [
                    ['start_time' => '06:30', 'days' => ['Monday', 'Wednesday', 'Saturday'], 'is_active' => true],
                    ['start_time' => '17:00', 'days' => ['Tuesday', 'Friday'], 'is_active' => true],
                ],
                'logs' => [
                    ['action' => 'auto_on', 'duration' => 2700, 'water_used' => 380.0, 'time' => now()->subHours(6)],
                    ['action' => 'manual_on', 'duration' => 1800, 'water_used' => 250.0, 'time' => now()->subDays(2)],
                    ['action' => 'auto_on', 'duration' => 3000, 'water_used' => 420.5, 'time' => now()->subDays(4)],
                ],
            ],
            [
                'user' => $testUser ?? $farmer,
                'device_id' => 'IOT-ZARAH-DH02',
                'name' => 'منظومة مراقبة البيوت المحمية - صوبة الطماطم (صنعاء)',
                'status' => 'active',
                'is_irrigation_on' => false,
                'auto_irrigation' => true,
                'water_consumption' => 1820.00,
                'temperature' => 26.4,
                'humidity' => 64.0,
                'soil_moisture' => 70.0,
                'water_level' => 75.0,
                'rain_level' => 0.0,
                'schedules' => [
                    ['start_time' => '07:00', 'days' => ['Sunday', 'Tuesday', 'Thursday'], 'is_active' => true],
                ],
                'logs' => [
                    ['action' => 'auto_on', 'duration' => 1500, 'water_used' => 180.0, 'time' => now()->subHours(12)],
                    ['action' => 'auto_on', 'duration' => 1500, 'water_used' => 180.0, 'time' => now()->subDays(1)],
                ],
            ],
            [
                'user' => $dhamarFarmer ?? $farmer,
                'device_id' => 'IOT-ZARAH-JH03',
                'name' => 'محطة الطقس وحساس الصقيع - حقل البطاطس (قاع جهران)',
                'status' => 'active',
                'is_irrigation_on' => false,
                'auto_irrigation' => false,
                'water_consumption' => 5400.20,
                'temperature' => 17.5,
                'humidity' => 38.0,
                'soil_moisture' => 54.0,
                'water_level' => 92.0,
                'rain_level' => 0.0,
                'schedules' => [
                    ['start_time' => '05:00', 'days' => ['Saturday', 'Tuesday'], 'is_active' => true],
                ],
                'logs' => [
                    ['action' => 'manual_on', 'duration' => 3600, 'water_used' => 850.0, 'time' => now()->subDays(1)],
                    ['action' => 'manual_on', 'duration' => 5400, 'water_used' => 1200.0, 'time' => now()->subDays(5)],
                ],
            ],
        ];

        foreach ($devices as $d) {
            if (! $d['user']) {
                continue;
            }

            $device = IotDevice::updateOrCreate(
                ['device_id' => $d['device_id']],
                [
                    'user_id' => $d['user']->id,
                    'name' => $d['name'],
                    'status' => $d['status'],
                    'last_sync_at' => now(),
                    'is_irrigation_on' => $d['is_irrigation_on'],
                    'auto_irrigation' => $d['auto_irrigation'],
                    'water_consumption' => $d['water_consumption'],
                    'temperature' => $d['temperature'],
                    'humidity' => $d['humidity'],
                    'soil_moisture' => $d['soil_moisture'],
                    'water_level' => $d['water_level'],
                    'rain_level' => $d['rain_level'],
                ]
            );

            foreach ($d['schedules'] as $sch) {
                IrrigationSchedule::create([
                    'iot_device_id' => $device->id,
                    'start_time' => $sch['start_time'],
                    'days' => $sch['days'],
                    'is_active' => $sch['is_active'],
                ]);
            }

            foreach ($d['logs'] as $log) {
                IrrigationLog::create([
                    'iot_device_id' => $device->id,
                    'action' => $log['action'],
                    'duration' => $log['duration'],
                    'water_used' => $log['water_used'],
                    'created_at' => $log['time'],
                    'updated_at' => $log['time'],
                ]);
            }
        }
    }
}
