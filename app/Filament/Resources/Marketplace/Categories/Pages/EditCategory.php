<?php

namespace App\Filament\Resources\Marketplace\Categories\Pages;

use App\Filament\Resources\Marketplace\Categories\CategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['image_url'] = $this->getRecord()->getRawOriginal('image_url');

        return $data;
    }
}
