<?php

namespace App\Filament\Resources\PlantGuide\Categories\Pages;

use App\Filament\Resources\PlantGuide\Categories\PlantCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlantCategories extends ListRecords
{
    protected static string $resource = PlantCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
