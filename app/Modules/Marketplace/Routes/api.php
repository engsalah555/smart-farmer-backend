<?php

use App\Modules\Marketplace\Http\Controllers\OrderController;
use App\Modules\Marketplace\Http\Controllers\ProductController;
use App\Modules\Marketplace\Http\Controllers\ReviewController;
use App\Modules\Marketplace\Http\Controllers\Seller\CatalogController;
use App\Modules\Marketplace\Http\Controllers\Seller\OrderController as SellerOrderController;
use App\Modules\Marketplace\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Modules\Marketplace\Http\Controllers\Seller\ProductMediaController;
use App\Modules\Marketplace\Http\Controllers\Seller\StoreController as SellerStoreController;
use App\Modules\Marketplace\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('marketplace')->group(function () {
    // --- Public Routes ---
    Route::middleware('throttle:api')->group(function () {
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/stores', [StoreController::class, 'index']);
        Route::get('/stores/{slug}', [StoreController::class, 'show']);
        Route::get('/stores/{storeIdentifier}/products', [StoreController::class, 'products']);
        Route::get('/products/{product}/reviews', [ReviewController::class, 'index']);
    });

    // --- Authenticated Routes ---
    Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {

        // Seller Routes
        Route::prefix('seller')->middleware(['can:sell', 'store_owner'])->group(function () {
            Route::get('/products', [SellerProductController::class, 'index']);
            Route::post('/products', [SellerProductController::class, 'store']);
            Route::match(['POST', 'PUT'], '/products/{product}', [SellerProductController::class, 'update']);
            Route::delete('/products/{product}', [SellerProductController::class, 'destroy']);
            Route::delete('/products/{product}/media/{mediaId}', [ProductMediaController::class, 'destroy']);

            Route::get('/catalogs', [CatalogController::class, 'index']);
            Route::post('/catalogs', [CatalogController::class, 'store']);
            Route::match(['POST', 'PUT'], '/catalogs/{catalog}', [CatalogController::class, 'update']);
            Route::delete('/catalogs/{catalog}', [CatalogController::class, 'destroy']);
            Route::post('/catalogs/{catalog}/assign-products', [CatalogController::class, 'assignProducts']);

            Route::get('/my-store', [SellerStoreController::class, 'show']);
            Route::post('/my-store/update', [SellerStoreController::class, 'update']);

            Route::get('/orders', [SellerOrderController::class, 'index']);
            Route::post('/orders/{order}/status', [SellerOrderController::class, 'updateStatus']);
        });

        // Buyer / General
        Route::post('/checkout', [OrderController::class, 'store']);
        Route::get('/orders', [OrderController::class, 'index']);
        Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel']);
        Route::post('/products/{product}/reviews', [ReviewController::class, 'store']);
    });
});
