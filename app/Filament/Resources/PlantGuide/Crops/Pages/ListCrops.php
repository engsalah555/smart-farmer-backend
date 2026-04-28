<?php

namespace App\Filament\Resources\PlantGuide\Crops\Pages;

use App\Filament\Resources\PlantGuide\Crops\CropResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCrops extends ListRecords
{
    protected static string $resource = CropResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
