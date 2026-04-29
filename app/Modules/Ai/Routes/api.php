<?php

use App\Modules\Ai\Http\Controllers\PlantDiseaseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'throttle:api'])->prefix('ai')->group(function () {
    Route::post('/analyze-plant', [PlantDiseaseController::class, 'analyze']);
});
