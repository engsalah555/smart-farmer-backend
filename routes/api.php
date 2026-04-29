<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeBatchController;
use App\Http\Controllers\Api\MetadataController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

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
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/auth/reset-password', [AuthController::class, 'resetPassword']);
});

Route::middleware('throttle:api')->group(function () {
    // Metadata & Config (Single Source of Truth)
    Route::get('/metadata', [MetadataController::class, 'index']);
    Route::get('/app-version', [MetadataController::class, 'appVersion']);
});

// =========================================================
// AUTHENTICATED — ALL USERS
// =========================================================
Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {

    // Auth
    Route::get('/auth/profile', [AuthController::class, 'profile']);
    Route::post('/auth/profile/update', [AuthController::class, 'updateProfile']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    // إحصائيات
    Route::get('/reports/statistics', [ReportController::class, 'getStatistics']);

    // ---- Home Batch ----
    Route::get('/home/data', [HomeBatchController::class, 'getHomeData']);

    // ---- Notifications ----
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);

    // ---- Admin (Protected) ----
    Route::prefix('admin')->middleware('can:admin')->group(function () {
        Route::get('/stats', [AdminController::class, 'getStats']);
        Route::get('/users', [AdminController::class, 'getUsers']);
        Route::put('/users/{id}/role', [AdminController::class, 'updateUserRole']);
        Route::post('/users/{id}/toggle-verification', [AdminController::class, 'toggleVerification']);
        Route::delete('/users/{id}', [AdminController::class, 'deleteUser']);

        // Post Reports Management
        Route::get('/reports', [AdminController::class, 'getReports']);
        Route::post('/reports/{id}/action', [AdminController::class, 'actionReport']);

        // IoT Requests Management
        Route::get('/iot-requests', [AdminController::class, 'getIotRequests']);
        Route::post('/iot-requests/{id}/approve', [AdminController::class, 'approveIotRequest']);
        Route::delete('/iot-requests/{id}', [AdminController::class, 'rejectIotRequest']);
    });
});
