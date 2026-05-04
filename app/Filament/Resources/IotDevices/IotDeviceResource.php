<?php

namespace App\Filament\Resources\IotDevices;

use App\Filament\Resources\IotDevices\Pages\CreateIotDevice;
use App\Filament\Resources\IotDevices\Pages\EditIotDevice;
use App\Filament\Resources\IotDevices\Pages\ListIotDevices;
use App\Filament\Resources\IotDevices\Schemas\IotDeviceForm;
use App\Filament\Resources\IotDevices\Tables\IotDevicesTable;
use App\Modules\Iot\Domain\Models\IotDevice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IotDeviceResource extends Resource
{
    protected static ?string $model = IotDevice::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCpuChip;

    public static function getNavigationGroup(): ?string
    {
        return 'إدارة النظام';
    }

    public static function getNavigationLabel(): string
    {
        return 'أجهزة الـ IoT';
    }

    public static function getModelLabel(): string
    {
        return 'جهاز IoT';
    }

    public static function getPluralModelLabel(): string
    {
        return 'أجهزة الـ IoT';
    }

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return IotDeviceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IotDevicesTable::configure($table);
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
            'index' => ListIotDevices::route('/'),
            'create' => CreateIotDevice::route('/create'),
            'edit' => EditIotDevice::route('/{record}/edit'),
        ];
    }
}
