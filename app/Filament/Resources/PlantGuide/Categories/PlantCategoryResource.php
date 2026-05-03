<?php

namespace App\Filament\Resources\PlantGuide\Categories;

use App\Filament\Resources\PlantGuide\Categories\Pages;
use App\Filament\Resources\PlantGuide\Categories\Schemas\PlantCategoryForm;
use App\Filament\Resources\PlantGuide\Categories\Tables\PlantCategoryTable;
use App\Models\Category;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PlantCategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-tag';
    }
    
    public static function getNavigationGroup(): ?string
    {
        return 'دليل المحاصيل';
    }

    public static function getModelLabel(): string
    {
        return 'تصنيف محاصيل';
    }

    public static function getPluralModelLabel(): string
    {
        return 'تصنيفات المحاصيل';
    }

    public static function form(Schema $schema): Schema
    {
        return PlantCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlantCategoryTable::configure($table)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', 'crop');
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
            'index' => Pages\ListPlantCategories::route('/'),
            'create' => Pages\CreatePlantCategories::route('/create'),
            'edit' => Pages\EditPlantCategories::route('/{record}/edit'),
        ];
    }
}
