<?php

namespace App\Filament\Resources\Marketplace\Pages;

use App\Filament\Resources\Marketplace\MarketplaceCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMarketplaceCategory extends CreateRecord
{
    protected static string $resource = MarketplaceCategoryResource::class;
}
