<?php

use App\Modules\Iot\Http\Controllers\IotController;
use App\Modules\Iot\Http\Controllers\IotDeviceRequestController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'throttle:api'])->prefix('iot')->group(function () {
    Route::get('/status', [IotController::class, 'getDeviceStatus']);
    Route::post('/toggle', [IotController::class, 'toggleIrrigation']);
    Route::post('/auto-irrigation', [IotController::class, 'updateAutoIrrigation']);
    Route::get('/schedules', [IotController::class, 'getSchedules']);
    Route::post('/schedules', [IotController::class, 'addSchedule']);
    Route::delete('/schedules/{id}', [IotController::class, 'deleteSchedule']);
    Route::post('/request', [IotDeviceRequestController::class, 'store']);
    Route::get('/requests', [IotDeviceRequestController::class, 'index']);
    Route::post('/sync', [IotController::class, 'sync']);
});
