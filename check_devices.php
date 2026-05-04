<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "Current Devices in iot_devices table:\n";
$devices = \App\Modules\Iot\Domain\Models\IotDevice::all();
foreach ($devices as $device) {
    echo "ID: {$device->id}, User ID: {$device->user_id}, Device ID: {$device->device_id}, Status: {$device->status}\n";
}

if ($devices->isEmpty()) {
    echo "The table is empty.\n";
}
