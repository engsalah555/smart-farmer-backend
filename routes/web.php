<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app-version', function () {
    return response()->json([
        'status' => 'online',
        'build' => '2026-10-04-v2',
        'storage_exists' => is_dir(storage_path('app/public')),
        'sorghum_exists' => file_exists(storage_path('app/public/plants/sorghum.jpg')),
    ]);
});

Route::get('/storage/{path}', function (string $path) {
    $filePath = storage_path('app/public/'.$path);

    if (file_exists($filePath) && is_file($filePath)) {
        return response()->file($filePath, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, HEAD, OPTIONS',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="400" height="300" viewBox="0 0 400 300">'
        .'<rect width="400" height="300" fill="#f0fdf4"/>'
        .'<text x="50%" y="45%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="28" font-weight="bold" fill="#10b981">زرعة</text>'
        .'<text x="50%" y="60%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="14" fill="#6b7280">Smart Farmer</text>'
        .'</svg>';

    return response($svg, 200, [
        'Content-Type' => 'image/svg+xml',
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET, HEAD, OPTIONS',
    ]);
})->where('path', '.*');
