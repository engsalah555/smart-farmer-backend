<?php

namespace App\Filament\Resources\Marketplace\Categories;

use App\Filament\Resources\Marketplace\Categories\Pages\CreateCategory;
use App\Filament\Resources\Marketplace\Categories\Pages\EditCategory;
use App\Filament\Resources\Marketplace\Categories\Pages\ListCategories;
use App\Filament\Resources\Marketplace\Categories\Schemas\CategoryForm;
use App\Filament\Resources\Marketplace\Categories\Tables\CategoriesTable;
use App\Modules\Marketplace\Domain\Models\StoreCatalog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = StoreCatalog::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-tag';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'المتجر الإلكتروني';
    }

    public static function getNavigationLabel(): string
    {
        return 'أقسام المتاجر';
    }

    public static function getModelLabel(): string
    {
        return 'قسم';
    }

    public static function getPluralModelLabel(): string
    {
        return 'أقسام المتاجر';
    }

    public static function form(Schema $schema): Schema
    {
        return CategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoriesTable::configure($table);
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
            'index' => ListCategories::route('/'),
            'create' => CreateCategory::route('/create'),
            'edit' => EditCategory::route('/{record}/edit'),
        ];
    }
}
