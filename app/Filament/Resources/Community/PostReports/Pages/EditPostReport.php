<?php

namespace App\Filament\Resources\Community\PostReports\Pages;

use App\Filament\Resources\Community\PostReports\PostReportResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPostReport extends EditRecord
{
    protected static string $resource = PostReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
