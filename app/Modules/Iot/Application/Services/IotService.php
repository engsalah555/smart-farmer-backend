<?php

namespace App\Modules\Iot\Application\Services;

use App\Modules\Iot\Domain\Models\IotDevice;
use App\Modules\Iot\Domain\Models\IrrigationLog;
use App\Modules\Iot\Domain\Models\IrrigationSchedule;
use App\Services\SupabaseService;
use Illuminate\Support\Facades\Log;

class IotService
{
    protected $supabase;

    public function __construct(SupabaseService $supabase)
    {
        $this->supabase = $supabase;
    }

    /**
     * Get the master device for the user if they have IoT enabled.
     */
    protected function getMasterDevice($user)
    {
        if (!$user->is_iot_enabled) {
            return null;
        }

        // Graduation project mode: All users share the same master device
        return IotDevice::first();
    }

    /**
     * Get device status and logs for the current user.
     */
    public function getStatus($user)
    {
        $device = $this->getMasterDevice($user);

        if (! $device) {
            return [
                'has_device' => false,
                'message' => $user->is_iot_enabled 
                    ? 'لم يتم إضافة جهاز مركزي للنظام بعد. يرجى إضافته من لوحة التحكم.'
                    : 'هذه الخدمة غير مفعلة لحسابك. يرجى التواصل مع الإدارة.',
            ];
        }

        return [
            'has_device' => true,
            'device' => $device->load(['schedules' => function ($q) {
                $q->where('is_active', true);
            }]),
            'last_logs' => IrrigationLog::where('iot_device_id', $device->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get(),
        ];
    }

    /**
     * Toggle manual irrigation status.
     */
    public function toggleIrrigation($user, bool $status)
    {
        $device = $this->getMasterDevice($user);
        if (!$device) throw new \Exception('لا تملك صلاحية للوصول إلى الجهاز.');

        if ($device->status !== 'active') {
            throw new \Exception('الجهاز غير نشط حالياً. يرجى انتظار موافقة الإدارة.');
        }

        $device->is_irrigation_on = $status;
        $device->save();

        // ✅ Sync with Supabase
        $this->supabase->updateDevice($device->device_id, [
            'is_irrigation_on' => $status,
            'last_sync_at' => now()->toIso8601String(),
        ]);

        // Log the action. water_used = 0 here because actual consumption
        // is computed from the duration after the pump is turned off.
        IrrigationLog::create([
            'iot_device_id' => $device->id,
            'action' => $status ? 'manual_on' : 'manual_off',
            'duration' => 0,
            'water_used' => 0,
        ]);

        return $device;
    }

    /**
     * Update auto-irrigation settings.
     */
    public function updateAutoIrrigation($user, bool $auto, int $threshold = 30)
    {
        $device = $this->getMasterDevice($user);
        if (!$device) throw new \Exception('لا تملك صلاحية للوصول إلى الجهاز.');

        if ($device->status !== 'active') {
            throw new \Exception('الجهاز غير نشط حالياً. يرجى انتظار موافقة الإدارة.');
        }

        $device->auto_irrigation = $auto;
        $device->save();

        // ✅ Sync with Supabase
        $this->supabase->updateDevice($device->device_id, [
            'auto_irrigation' => $auto,
            'auto_threshold' => $threshold,
            'last_sync_at' => now()->toIso8601String(),
        ]);

        return $device;
    }

    /**
     * Add a new irrigation schedule.
     */
    public function addSchedule($user, array $data)
    {
        $device = $this->getMasterDevice($user);
        if (!$device) throw new \Exception('لا تملك صلاحية للوصول إلى الجهاز.');

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
        $device = $this->getMasterDevice($user);
        if (!$device) throw new \Exception('لا تملك صلاحية للوصول إلى الجهاز.');

        if ($device->status !== 'active') {
            throw new \Exception('الجهاز غير نشط حالياً. يرجى انتظار موافقة الإدارة.');
        }

        $schedule = IrrigationSchedule::where('iot_device_id', $device->id)->findOrFail($scheduleId);

        return $schedule->delete();
    }
}
