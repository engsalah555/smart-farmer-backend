<?php

namespace App\Modules\Iot\Application\Services;

use App\Modules\Iot\Domain\Models\IotDevice;
use App\Modules\Iot\Domain\Models\IrrigationSchedule;
use App\Modules\Iot\Domain\Models\IrrigationLog;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IotService
{
    /**
     * Get device status and logs for the current user.
     */
    public function getStatus($user)
    {
        $device = IotDevice::where('user_id', $user->id)->first();

        if (!$device) {
            return [
                'has_device' => false,
                'message' => 'لم يتم العثور على جهاز مرتبط بهذا الحساب. يمكنك طلب تفعيل الخدمة الآن.'
            ];
        }

        return [
            'has_device' => true,
            'device' => $device->load(['schedules' => function($q) {
                $q->where('is_active', true);
            }]),
            'last_logs' => IrrigationLog::where('iot_device_id', $device->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
        ];
    }

    /**
     * Toggle manual irrigation status.
     */
    public function toggleIrrigation($user, bool $status)
    {
        $device = IotDevice::where('user_id', $user->id)->firstOrFail();

        if ($device->status !== 'active') {
            throw new \Exception('الجهاز غير نشط حالياً. يرجى انتظار موافقة الإدارة.');
        }

        $device->is_irrigation_on = $status;
        $device->save();

        // ✅ Sync with Firebase RTDB (New)
        \App\Jobs\SyncFirebaseSettings::dispatch("SmartFarm/Devices/{$device->device_id}/Settings", [
            'ManualPump' => $status
        ]);

        // Log the action. water_used = 0 here because actual consumption
        // is computed from the duration after the pump is turned off.
        IrrigationLog::create([
            'iot_device_id' => $device->id,
            'action'        => $status ? 'manual_on' : 'manual_off',
            'duration'      => 0,
            'water_used'    => 0,
        ]);

        return $device;
    }

    /**
     * Update auto-irrigation settings.
     */
    public function updateAutoIrrigation($user, bool $auto, int $threshold = 30)
    {
        $device = IotDevice::where('user_id', $user->id)->firstOrFail();

        if ($device->status !== 'active') {
            throw new \Exception('الجهاز غير نشط حالياً. يرجى انتظار موافقة الإدارة.');
        }

        $device->auto_irrigation = $auto;
        $device->save();

        // ✅ Sync with Firebase RTDB (New)
        \App\Jobs\SyncFirebaseSettings::dispatch("SmartFarm/Devices/{$device->device_id}/Settings", [
            'Mode' => $auto ? 'AUTO' : 'MANUAL',
            'AutoThreshold' => $threshold
        ]);

        return $device;
    }

    /**
     * Fetch real-time sensor data from Firebase and sync local DB.
     */
    public function syncFromFirebase($user)
    {
        $device = IotDevice::where('user_id', $user->id)->first();
        if (!$device) return null;

        $firebase = app(\App\Services\FirebaseService::class);
        $data = $firebase->get("SmartFarm/Devices/{$device->device_id}/Sensors");
 
        if ($data) {
            $device->update([
                'temperature' => $data['temperature'] ?? $device->temperature,
                'humidity' => $data['humidity'] ?? $device->humidity,
                'soil_moisture' => $data['soil_moisture'] ?? $device->soil_moisture,
                'water_level' => $data['water_level'] ?? $device->water_level,
                'rain_level' => $data['rain_level'] ?? $device->rain_level,
                'last_sync_at' => now(),
            ]);
            
            // Also update status if available
            $status = $firebase->get("SmartFarm/Devices/{$device->device_id}/Status");
            if ($status) {
                $device->update([
                    'is_irrigation_on' => $status['PumpON'] ?? $device->is_irrigation_on,
                ]);
            }
        }

        return $device;
    }

    /**
     * Add a new irrigation schedule.
     */
    public function addSchedule($user, array $data)
    {
        $device = IotDevice::where('user_id', $user->id)->firstOrFail();

        if ($device->status !== 'active') {
            throw new \Exception('الجهاز غير نشط حالياً. يرجى انتظار موافقة الإدارة.');
        }

        return $device->schedules()->create([
            'start_time' => $data['start_time'],
            'days' => $data['days'],
            'is_active' => true,
        ]);
    }

    /**
     * Delete an irrigation schedule.
     */
    public function deleteSchedule($user, $scheduleId)
    {
        $device = IotDevice::where('user_id', $user->id)->firstOrFail();

        if ($device->status !== 'active') {
            throw new \Exception('الجهاز غير نشط حالياً. يرجى انتظار موافقة الإدارة.');
        }

        $schedule = IrrigationSchedule::where('iot_device_id', $device->id)->findOrFail($scheduleId);
        return $schedule->delete();
    }


}
