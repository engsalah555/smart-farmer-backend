<?php

namespace App\Filament\Resources\PlantGuide\Crops\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CropsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('المحصول')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('المزارع')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('crop_type')
                    ->label('النوع')
                    ->searchable(),

                TextColumn::make('health_status')
                    ->label('الحالة الصحية')
                    ->numeric(decimalPlaces: 0)
                    ->suffix('%')
                    ->color(fn ($state) => $state < 50 ? 'danger' : ($state < 80 ? 'warning' : 'success'))
                    ->sortable(),

                IconColumn::make('needs_irrigation')
                    ->label('يحتاج ري')
                    ->boolean(),

                TextColumn::make('plantation_date')
                    ->label('تاريخ الزراعة')
                    ->date('Y-m-d')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('user_id')
                    ->label('المزارع')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
