<?php

use App\Modules\Community\Http\Controllers\CommunityController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'throttle:api'])->prefix('community')->group(function () {
    Route::get('/posts', [CommunityController::class, 'getPosts']);
    Route::post('/posts', [CommunityController::class, 'createPost']);
    Route::match(['POST', 'PUT'], '/posts/{id}', [CommunityController::class, 'updatePost']);
    Route::delete('/posts/{id}', [CommunityController::class, 'deletePost']);
    Route::get('/my-posts', [CommunityController::class, 'getMyPosts']);
    Route::post('/posts/{id}/like', [CommunityController::class, 'toggleLike']);
    Route::post('/posts/{id}/save', [CommunityController::class, 'toggleSave']);
    Route::get('/posts/{id}/comments', [CommunityController::class, 'getComments']);
    Route::post('/posts/{id}/comments', [CommunityController::class, 'addComment']);
    Route::put('/comments/{id}', [CommunityController::class, 'updateComment']);
    Route::delete('/comments/{id}', [CommunityController::class, 'deleteComment']);
    Route::get('/saved-posts', [CommunityController::class, 'getSavedPosts']);
    Route::get('/activity', [CommunityController::class, 'getActivity']);
    Route::post('/posts/{id}/report', [CommunityController::class, 'reportPost']);
});
