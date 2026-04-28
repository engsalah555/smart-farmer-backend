<?php

namespace App\Filament\Resources\PlantGuide\Plants\Pages;

use App\Filament\Resources\PlantGuide\Plants\PlantResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPlant extends EditRecord
{
    protected static string $resource = PlantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
