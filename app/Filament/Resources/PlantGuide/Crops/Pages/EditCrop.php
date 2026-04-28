<?php

namespace App\Filament\Resources\PlantGuide\Crops\Pages;

use App\Filament\Resources\PlantGuide\Crops\CropResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCrop extends EditRecord
{
    protected static string $resource = CropResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
