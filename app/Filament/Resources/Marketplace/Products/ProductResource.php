<?php

namespace App\Filament\Resources\Marketplace\Products;

use App\Filament\Resources\Marketplace\Products\Pages\CreateProduct;
use App\Filament\Resources\Marketplace\Products\Pages\EditProduct;
use App\Filament\Resources\Marketplace\Products\Pages\ListProducts;
use App\Filament\Resources\Marketplace\Products\Schemas\ProductForm;
use App\Filament\Resources\Marketplace\Products\Tables\ProductsTable;
use App\Modules\Marketplace\Domain\Models\Product;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'المتجر الإلكتروني';
    }

    public static function getNavigationLabel(): string
    {
        return 'المنتجات';
    }

    public static function getModelLabel(): string
    {
        return 'منتج';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المنتجات';
    }

    public static function form(Schema $schema): Schema
    {
        return ProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductsTable::configure($table);
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
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
