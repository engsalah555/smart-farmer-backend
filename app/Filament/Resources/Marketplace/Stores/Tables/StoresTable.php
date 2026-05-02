<?php

namespace App\Filament\Resources\Marketplace\Stores\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

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
                        'بذور' => 'بذور',
                        'أسمدة' => 'أسمدة',
                        'مبيدات' => 'مبيدات',
                        'محاصيل' => 'محاصيل',
                        'معدات' => 'معدات',
                        'مشاتل' => 'مشاتل',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'بذور' => 'success',
                        'أسمدة' => 'info',
                        'مبيدات' => 'danger',
                        'محاصيل' => 'warning',
                        'معدات' => 'primary',
                        'مشاتل' => 'success',
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
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending' => 'قيد المراجعة',
                        'verified' => 'موثق',
                        'rejected' => 'مرفوض',
                    ]),
                SelectFilter::make('store_type')
                    ->label('النوع')
                    ->options([
                        'بذور' => 'بذور',
                        'أسمدة' => 'أسمدة',
                        'مبيدات' => 'مبيدات',
                        'محاصيل' => 'محاصيل',
                        'معدات' => 'معدات',
                        'مشاتل' => 'مشاتل',
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
