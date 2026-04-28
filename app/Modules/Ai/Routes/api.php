<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Ai\Http\Controllers\PlantDiseaseController;

Route::middleware(['auth:sanctum', 'throttle:api'])->prefix('ai')->group(function () {
    Route::post('/analyze-plant', [PlantDiseaseController::class, 'analyze']);
});
