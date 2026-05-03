<?php

namespace App\Filament\Resources\PlantGuide\Categories\Pages;

use App\Filament\Resources\PlantGuide\Categories\PlantCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlantCategories extends EditRecord
{
    protected static string $resource = PlantCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
