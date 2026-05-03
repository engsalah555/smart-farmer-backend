<?php

namespace App\Filament\Resources\Marketplace\Pages;

use App\Filament\Resources\Marketplace\MarketplaceCategoryResource;
use Filament\Resources\Pages\ListRecords;

class ListMarketplaceCategories extends ListRecords
{
    protected static string $resource = MarketplaceCategoryResource::class;
}
