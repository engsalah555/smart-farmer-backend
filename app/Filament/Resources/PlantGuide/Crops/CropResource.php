<?php

namespace App\Filament\Resources\PlantGuide\Crops;

use App\Filament\Resources\PlantGuide\Crops\Pages\CreateCrop;
use App\Filament\Resources\PlantGuide\Crops\Pages\EditCrop;
use App\Filament\Resources\PlantGuide\Crops\Pages\ListCrops;
use App\Filament\Resources\PlantGuide\Crops\Schemas\CropForm;
use App\Filament\Resources\PlantGuide\Crops\Tables\CropsTable;
use App\Modules\PlantGuide\Domain\Models\Crop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CropResource extends Resource
{
    protected static ?string $model = Crop::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-variable';

    public static function getNavigationGroup(): ?string
    {
        return 'الدليل الزراعي';
    }

    public static function getNavigationLabel(): string
    {
        return 'المحاصيل المزروعة';
    }

    public static function getModelLabel(): string
    {
        return 'محصول';
    }

    public static function getPluralModelLabel(): string
    {
        return 'المحاصيل المزروعة';
    }

    public static function form(Schema $schema): Schema
    {
        return CropForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CropsTable::configure($table);
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
            'index' => ListCrops::route('/'),
            'create' => CreateCrop::route('/create'),
            'edit' => EditCrop::route('/{record}/edit'),
        ];
    }
}
