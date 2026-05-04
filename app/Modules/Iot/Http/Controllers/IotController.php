<?php

namespace App\Modules\Iot\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Iot\AddScheduleRequest;
use App\Http\Requests\Api\Iot\ToggleIrrigationRequest;
use App\Http\Requests\Api\Iot\UpdateAutoIrrigationRequest;
use App\Modules\Iot\Application\Services\IotService;
use App\Traits\ApiResponder;
use Illuminate\Support\Facades\Auth;

class IotController extends Controller
{
    use ApiResponder;

    public function __construct(protected IotService $iotService) {}

    /**
     * Get the current device associated with the user.
     */
    public function getDeviceStatus()
    {
        $user = Auth::user();

        $status = $this->iotService->getStatus($user);

        return $this->success($status);
    }

    /**
     * Toggle irrigation manual state.
     */
    public function toggleIrrigation(ToggleIrrigationRequest $request)
    {
        $device = $this->iotService->toggleIrrigation(Auth::user(), $request->status);

        return $this->success(
            [
                'is_irrigation_on' => $device->is_irrigation_on,
            ],
            $request->status ? 'تم تشغيل الري بنجاح' : 'تم إيقاف الري بنجاح'
        );
    }

    /**
     * Update auto-irrigation settings.
     */
    public function updateAutoIrrigation(UpdateAutoIrrigationRequest $request)
    {
        $device = $this->iotService->updateAutoIrrigation(
            Auth::user(),
            $request->auto_irrigation,
            $request->input('auto_threshold', 30)
        );

        return $this->success(
            [
                'auto_irrigation' => $device->auto_irrigation,
            ],
            'تم تحديث إعدادات الري التلقائي'
        );
    }

    /**
     * Manage Schedules
     */
    public function getSchedules()
    {
        $device = Auth::user()->iotDevice;
        if (! $device) {
            return $this->error('لم يتم العثور على جهاز مرتبط بهذا الحساب', 404);
        }

        return $this->success($device->schedules);
    }

    public function addSchedule(AddScheduleRequest $request)
    {
        $schedule = $this->iotService->addSchedule(Auth::user(), $request->validated());

        return $this->success($schedule, 'تمت إضافة الجدول بنجاح', 201);
    }

    public function deleteSchedule($id)
    {
        $this->iotService->deleteSchedule(Auth::user(), $id);

        return $this->success(null, 'تم حذف الجدول بنجاح');
    }
}
