<?php

namespace App\Filament\Resources\PlantGuide\Plants;

use App\Filament\Resources\PlantGuide\Plants\Pages\CreatePlant;
use App\Filament\Resources\PlantGuide\Plants\Pages\EditPlant;
use App\Filament\Resources\PlantGuide\Plants\Pages\ListPlants;
use App\Filament\Resources\PlantGuide\Plants\Schemas\PlantForm;
use App\Filament\Resources\PlantGuide\Plants\Tables\PlantsTable;
use App\Modules\PlantGuide\Domain\Models\Plant;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PlantResource extends Resource
{
    protected static ?string $model = Plant::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $recordTitleAttribute = 'common_name';

    public static function getNavigationGroup(): ?string
    {
        return 'الدليل الزراعي';
    }

    public static function getNavigationLabel(): string
    {
        return 'موسوعة النباتات';
    }

    public static function getModelLabel(): string
    {
        return 'نبات';
    }

    public static function getPluralModelLabel(): string
    {
        return 'موسوعة النباتات';
    }

    public static function form(Schema $schema): Schema
    {
        return PlantForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlantsTable::configure($table);
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
            'index' => ListPlants::route('/'),
            'create' => CreatePlant::route('/create'),
            'edit' => EditPlant::route('/{record}/edit'),
        ];
    }
}
