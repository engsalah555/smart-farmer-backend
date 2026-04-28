<?php

namespace App\Filament\Resources\Marketplace\Stores;

use App\Filament\Resources\Marketplace\Stores\Pages\CreateStore;
use App\Filament\Resources\Marketplace\Stores\Pages\EditStore;
use App\Filament\Resources\Marketplace\Stores\Pages\ListStores;
use App\Filament\Resources\Marketplace\Stores\Schemas\StoreForm;
use App\Filament\Resources\Marketplace\Stores\Tables\StoresTable;
use App\Modules\Marketplace\Domain\Models\Store;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $recordTitleAttribute = 'store_name';

    public static function getNavigationGroup(): ?string
    {
        return 'المتجر الإلكتروني';
    }

    public static function getNavigationLabel(): string
    {
        return 'المتاجر';
    }

    public static function getModelLabel(): string
    {
        return 'متجر';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المتاجر';
    }

    public static function form(Schema $schema): Schema
    {
        return StoreForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StoresTable::configure($table);
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
            'index' => ListStores::route('/'),
            'create' => CreateStore::route('/create'),
            'edit' => EditStore::route('/{record}/edit'),
        ];
    }
}
