<?php

namespace App\Filament\Resources\Marketplace\Products\Pages;

use App\Filament\Resources\Marketplace\Products\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

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
