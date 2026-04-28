<?php

namespace App\Filament\Resources\Community\PostReports;

use App\Filament\Resources\Community\PostReports\Pages\CreatePostReport;
use App\Filament\Resources\Community\PostReports\Pages\EditPostReport;
use App\Filament\Resources\Community\PostReports\Pages\ListPostReports;
use App\Filament\Resources\Community\PostReports\Schemas\PostReportForm;
use App\Filament\Resources\Community\PostReports\Tables\PostReportsTable;
use App\Modules\Community\Domain\Models\PostReport;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostReportResource extends Resource
{
    protected static ?string $model = PostReport::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-exclamation-triangle';

    public static function getNavigationGroup(): ?string
    {
        return 'المنتدى الزراعي';
    }

    public static function getNavigationLabel(): string
    {
        return 'بلاغات المنشورات';
    }

    public static function getModelLabel(): string
    {
        return 'بلاغ';
    }

    public static function getPluralModelLabel(): string
    {
        return 'بلاغات المنشورات';
    }

    public static function form(Schema $schema): Schema
    {
        return PostReportForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostReportsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPostReports::route('/'),
            'create' => CreatePostReport::route('/create'),
            'edit' => EditPostReport::route('/{record}/edit'),
        ];
    }
}
