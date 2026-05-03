<?php

namespace App\Filament\Resources\PlantGuide\Categories\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PlantCategoryTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('اسم التصنيف')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('icon')
                    ->label('الأيقونة'),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ]);
    }
}
