<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Modules\Iot\Domain\Models\IotDevice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class IotInitializer extends Command
{
    protected $signature = 'iot:init';
    protected $description = 'Initialize master IoT device and enable IoT for the test user';

    public function handle()
    {
        $this->info('Initializing IoT System...');

        // 1. Ensure User exists
        $user = User::where('email', 'admin@example.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'user_type' => 'admin',
                'is_iot_enabled' => true,
            ]);
            $this->info('Created admin user: admin@example.com');
        } else {
            $user->update(['is_iot_enabled' => true]);
            $this->info('Enabled IoT for existing user: ' . $user->email);
        }

        // 2. Ensure IotDevice exists
        $deviceId = 'ESP32-MASTER-001';
        $device = IotDevice::where('device_id', $deviceId)->first();

        if (!$device) {
            IotDevice::create([
                'user_id' => $user->id,
                'device_id' => $deviceId,
                'name' => 'المستشعر المركزي',
                'status' => 'active',
                'temperature' => 0,
                'humidity' => 0,
                'soil_moisture' => 0,
                'water_level' => 0,
                'rain_level' => 0,
            ]);
            $this->info("Created master device: $deviceId");
        } else {
            $device->update(['user_id' => $user->id]);
            $this->info("Verified master device: $deviceId (Linked to User ID: $user->id)");
        }

        $this->info('IoT Initialization complete!');
    }
}
