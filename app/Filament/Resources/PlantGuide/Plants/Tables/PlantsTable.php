<?php

namespace App\Filament\Resources\PlantGuide\Plants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PlantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('image')
                    ->label('الصورة')
                    ->circular(),

                TextColumn::make('common_name')
                    ->label('الاسم الشائع')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('scientific_name')
                    ->label('الاسم العلمي')
                    ->searchable()
                    ->fontFamily('serif')
                    ->sortable(),

                TextColumn::make('difficulty_level')
                    ->label('الصعوبة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'سهل' => 'success',
                        'متوسط' => 'warning',
                        'صعب' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('planting_season')
                    ->label('الموسم')
                    ->searchable(),

                TextColumn::make('water_needs')
                    ->label('حاجة المياه')
                    ->searchable(),
            ])
            ->filters([
                //
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
