<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Community\Domain\Repositories\PostRepositoryInterface;
use App\Modules\Community\Infrastructure\Repositories\EloquentPostRepository;
use App\Modules\Community\Application\Services\PostService;

class CommunityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind Repository
        $this->app->bind(PostRepositoryInterface::class, EloquentPostRepository::class);

        // Bind Service
        $this->app->singleton(PostService::class, function ($app) {
            return new PostService($app->make(PostRepositoryInterface::class));
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
