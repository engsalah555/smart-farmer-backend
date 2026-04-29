<?php

namespace App\Filament\Resources\Marketplace\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ImageColumn::make('image')
                    ->label('الصورة'),

                TextColumn::make('name')
                    ->label('اسم المنتج')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->slug),

                TextColumn::make('store.store_name')
                    ->label('المتجر')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('السعر')
                    ->money('YER')
                    ->sortable(),

                TextColumn::make('stock_quantity')
                    ->label('الكمية')
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state): string => $state > 0 ? 'success' : 'danger'),

                ToggleColumn::make('is_featured')
                    ->label('مميز'),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_featured')
                    ->label('منتجات مميزة'),
                SelectFilter::make('store_id')
                    ->relationship('store', 'store_name')
                    ->label('المتجر'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
