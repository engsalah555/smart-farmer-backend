<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * The modules that should be registered.
     */
    protected $modules = [
        'Ai',
        'Community',
        'Iot',
        'Marketplace',
        'PlantGuide',
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        // Register module-specific services if any
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerModuleRoutes();
    }

    /**
     * Register the routes for each module.
     */
    protected function registerModuleRoutes(): void
    {
        foreach ($this->modules as $module) {
            $routePath = app_path("Modules/{$module}/Routes/api.php");

            if (file_exists($routePath)) {
                Route::prefix('api')
                    ->middleware('api')
                    ->group($routePath);
            }
        }
    }
}
