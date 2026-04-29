<?php

namespace App\Providers;

use App\Modules\Farm\Application\Services\CropService;
use App\Modules\Farm\Domain\Repositories\CropRepositoryInterface;
use App\Modules\Farm\Infrastructure\Repositories\EloquentCropRepository;
use Illuminate\Support\ServiceProvider;

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
