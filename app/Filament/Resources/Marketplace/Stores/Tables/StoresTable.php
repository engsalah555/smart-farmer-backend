<?php

namespace App\Filament\Resources\Marketplace\Stores\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;

class StoresTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('الشعار')
                    ->circular(),

                TextColumn::make('store_name')
                    ->label('اسم المتجر')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->slug),

                TextColumn::make('user.name')
                    ->label('صاحب المتجر')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('store_type')
                    ->label('النوع')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'seeds' => 'بذور',
                        'tools' => 'أدوات',
                        'fertilizers' => 'أسمدة',
                        'all' => 'متنوع',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'seeds' => 'success',
                        'tools' => 'warning',
                        'fertilizers' => 'info',
                        'all' => 'primary',
                        default => 'gray',
                    }),

                SelectColumn::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending' => 'قيد المراجعة',
                        'verified' => 'موثق',
                        'rejected' => 'مرفوض',
                    ])
                    ->selectablePlaceholder(false),

                TextColumn::make('products_count')
                    ->label('المنتجات')
                    ->counts('products')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending' => 'قيد المراجعة',
                        'verified' => 'موثق',
                        'rejected' => 'مرفوض',
                    ]),
                \Filament\Tables\Filters\SelectFilter::make('store_type')
                    ->label('النوع')
                    ->options([
                        'seeds' => 'بذور',
                        'tools' => 'أدوات',
                        'fertilizers' => 'أسمدة',
                        'all' => 'متنوع',
                    ]),
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
