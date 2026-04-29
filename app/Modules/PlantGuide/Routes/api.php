<?php

use App\Modules\PlantGuide\Http\Controllers\CropGuideController;
use App\Modules\PlantGuide\Http\Controllers\FarmController;
use App\Modules\PlantGuide\Http\Controllers\PlantController;
use App\Modules\PlantGuide\Http\Controllers\WarningController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::middleware('throttle:api')->group(function () {
    Route::get('/warnings', [WarningController::class, 'getActiveWarnings']);
    Route::get('/crop-guides', [CropGuideController::class, 'index']);
    Route::get('/crop-guides/search', [CropGuideController::class, 'search']);
    Route::get('/plants', [PlantController::class, 'index']);
    Route::get('/plants/categories', [PlantController::class, 'categories']);
    Route::get('/plants/{id}', [PlantController::class, 'show']);
});

// Authenticated Routes
Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {
    Route::get('/farm/my-crops', [FarmController::class, 'getMyCrops']);
    Route::post('/farm/crops', [FarmController::class, 'addCrop']);
    Route::delete('/farm/crops/{id}', [FarmController::class, 'deleteCrop']);
});
