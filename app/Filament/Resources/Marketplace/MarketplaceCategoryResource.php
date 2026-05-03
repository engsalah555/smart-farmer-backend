<?php

namespace App\Filament\Resources\Marketplace;

use App\Filament\Resources\Marketplace\Pages\CreateMarketplaceCategory;
use App\Filament\Resources\Marketplace\Pages\EditMarketplaceCategory;
use App\Filament\Resources\Marketplace\Pages\ListMarketplaceCategories;
use App\Filament\Resources\Marketplace\Schemas\MarketplaceCategoryForm;
use App\Filament\Resources\Marketplace\Tables\MarketplaceCategoriesTable;
use App\Models\Category;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class MarketplaceCategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-tag';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'سوق المزارعين';
    }

    public static function getNavigationLabel(): string
    {
        return 'تصنيفات المتجر';
    }

    public static function getModelLabel(): string
    {
        return 'تصنيف';
    }

    public static function getPluralModelLabel(): string
    {
        return 'تصنيفات المتجر';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->marketplace();
    }

    public static function form(Schema $schema): Schema
    {
        return MarketplaceCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MarketplaceCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMarketplaceCategories::route('/'),
            'create' => CreateMarketplaceCategory::route('/create'),
            'edit' => EditMarketplaceCategory::route('/{record}/edit'),
        ];
    }
}
