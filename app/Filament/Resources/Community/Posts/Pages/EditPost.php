<?php

namespace App\Filament\Resources\Community\Posts\Pages;

use App\Filament\Resources\Community\Posts\PostResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['image_url'] = $this->getRecord()->getRawOriginal('image_url') ?: $this->getRecord()->getRawOriginal('image');

        return $data;
    }
}
