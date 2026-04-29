<?php

use App\Providers\AppServiceProvider;
use App\Providers\CommunityServiceProvider;
use App\Providers\FarmServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\ModuleServiceProvider;

return [
    AppServiceProvider::class,
    CommunityServiceProvider::class,
    FarmServiceProvider::class,
    AdminPanelProvider::class,
    ModuleServiceProvider::class,
];
