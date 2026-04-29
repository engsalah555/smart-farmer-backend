<?php

namespace App\Filament\Resources\Marketplace\Orders;

use App\Filament\Resources\Marketplace\Orders\Pages\CreateOrder;
use App\Filament\Resources\Marketplace\Orders\Pages\EditOrder;
use App\Filament\Resources\Marketplace\Orders\Pages\ListOrders;
use App\Filament\Resources\Marketplace\Orders\Schemas\OrderForm;
use App\Filament\Resources\Marketplace\Orders\Tables\OrdersTable;
use App\Modules\Marketplace\Domain\Models\Order;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $recordTitleAttribute = 'id';

    public static function getNavigationGroup(): ?string
    {
        return 'المتجر الإلكتروني';
    }

    public static function getNavigationLabel(): string
    {
        return 'الطلبات';
    }

    public static function getModelLabel(): string
    {
        return 'طلب';
    }

    public static function getPluralModelLabel(): string
    {
        return 'الطلبات';
    }

    public static function form(Schema $schema): Schema
    {
        return OrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrdersTable::configure($table);
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
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }
}
