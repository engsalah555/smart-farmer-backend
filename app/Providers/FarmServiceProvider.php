<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Farm\Domain\Repositories\CropRepositoryInterface;
use App\Modules\Farm\Infrastructure\Repositories\EloquentCropRepository;
use App\Modules\Farm\Application\Services\CropService;

class FarmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind Repository
        $this->app->bind(CropRepositoryInterface::class, EloquentCropRepository::class);

        // Bind Service
        $this->app->singleton(CropService::class, function ($app) {
            return new CropService($app->make(CropRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
