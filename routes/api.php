<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\MetadataController;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
| Note: Modular routes (IoT, Marketplace, Community, AI, PlantGuide) 
| are loaded via App\Providers\ModuleServiceProvider.
|
*/

// =========================================================
// PUBLIC — NO AUTH REQUIRED
// =========================================================
Route::middleware('throttle:auth')->group(function () {
    Route::post('/auth/register',       [AuthController::class, 'register']);
    Route::post('/auth/login',          [AuthController::class, 'login']);
    Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/auth/reset-password', [AuthController::class, 'resetPassword']);
});

Route::middleware('throttle:api')->group(function () {
    // Metadata & Config (Single Source of Truth)
    Route::get('/metadata',              [MetadataController::class, 'index']);
    Route::get('/app-version',           [MetadataController::class, 'appVersion']);
});

// =========================================================
// AUTHENTICATED — ALL USERS
// =========================================================
Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {

    // Auth
    Route::get('/auth/profile',             [AuthController::class, 'profile']);
    Route::post('/auth/profile/update',     [AuthController::class, 'updateProfile']);
    Route::post('/auth/logout',             [AuthController::class, 'logout']);

    // إحصائيات
    Route::get('/reports/statistics', [ReportController::class, 'getStatistics']);

    // ---- Home Batch ----
    Route::get('/home/data', [\App\Http\Controllers\Api\HomeBatchController::class, 'getHomeData']);

    // ---- Notifications ----
    Route::get('/notifications',                    [\App\Http\Controllers\Api\NotificationController::class, 'index']);
    Route::post('/notifications/{id}/read',         [\App\Http\Controllers\Api\NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all',          [\App\Http\Controllers\Api\NotificationController::class, 'markAllAsRead']);

    // ---- Admin (Protected) ----
    Route::prefix('admin')->middleware('can:admin')->group(function () {
        Route::get('/stats',                [\App\Http\Controllers\Api\AdminController::class, 'getStats']);
        Route::get('/users',                [\App\Http\Controllers\Api\AdminController::class, 'getUsers']);
        Route::put('/users/{id}/role',      [\App\Http\Controllers\Api\AdminController::class, 'updateUserRole']);
        Route::post('/users/{id}/toggle-verification', [\App\Http\Controllers\Api\AdminController::class, 'toggleVerification']);
        Route::delete('/users/{id}',        [\App\Http\Controllers\Api\AdminController::class, 'deleteUser']);
        
        // Post Reports Management
        Route::get('/reports',              [\App\Http\Controllers\Api\AdminController::class, 'getReports']);
        Route::post('/reports/{id}/action', [\App\Http\Controllers\Api\AdminController::class, 'actionReport']);

        // IoT Requests Management
        Route::get('/iot-requests',               [\App\Http\Controllers\Api\AdminController::class, 'getIotRequests']);
        Route::post('/iot-requests/{id}/approve', [\App\Http\Controllers\Api\AdminController::class, 'approveIotRequest']);
        Route::delete('/iot-requests/{id}',       [\App\Http\Controllers\Api\AdminController::class, 'rejectIotRequest']);
    });
});
