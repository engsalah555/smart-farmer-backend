<?php

namespace App\Filament\Resources\Marketplace\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('رقم الطلب')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('المشتري')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('store.store_name')
                    ->label('المتجر')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_price')
                    ->label('الإجمالي')
                    ->money('YER')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('حالة الطلب')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending'    => 'قيد الانتظار',
                        'confirmed'  => 'تم التأكيد',
                        'processing' => 'قيد التجهيز',
                        'shipped'    => 'تم الشحن',
                        'delivered'  => 'تم التوصيل',
                        'cancelled'  => 'ملغي',
                        default      => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'pending'    => 'warning',
                        'confirmed'  => 'info',
                        'processing' => 'primary',
                        'shipped'    => 'info',
                        'delivered'  => 'success',
                        'cancelled'  => 'danger',
                        default      => 'gray',
                    }),

                TextColumn::make('payment_status')
                    ->label('حالة الدفع')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'قيد الانتظار',
                        'paid' => 'تم الدفع',
                        'failed' => 'فشل',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'failed' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('تاريخ الطلب')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->label('حالة الطلب')
                    ->options([
                        'pending'    => 'قيد الانتظار',
                        'confirmed'  => 'تم التأكيد',
                        'processing' => 'قيد التجهيز',
                        'shipped'    => 'تم الشحن',
                        'delivered'  => 'تم التوصيل',
                        'cancelled'  => 'ملغي',
                    ]),
                \Filament\Tables\Filters\SelectFilter::make('payment_status')
                    ->label('حالة الدفع')
                    ->options([
                        'pending' => 'قيد الانتظار',
                        'paid' => 'تم الدفع',
                        'failed' => 'فشل',
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
