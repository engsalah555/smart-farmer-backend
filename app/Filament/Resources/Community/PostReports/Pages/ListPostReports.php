<?php

namespace App\Filament\Resources\Community\PostReports\Pages;

use App\Filament\Resources\Community\PostReports\PostReportResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostReports extends ListRecords
{
    protected static string $resource = PostReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
