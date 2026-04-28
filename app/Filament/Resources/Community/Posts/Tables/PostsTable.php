<?php

namespace App\Filament\Resources\Community\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('الصورة')
                    ->circular(),

                TextColumn::make('title')
                    ->label('العنوان')
                    ->searchable()
                    ->wrap()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('الناشر')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('likes_count')
                    ->label('الإعجابات')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('reports_count')
                    ->label('البلاغات')
                    ->badge()
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'gray')
                    ->sortable(),

                IconColumn::make('is_hidden')
                    ->label('مخفي')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('تاريخ النشر')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_hidden')
                    ->label('الحالة')
                    ->placeholder('الكل')
                    ->trueLabel('المنشورات المخفية')
                    ->falseLabel('المنشورات الظاهرة'),
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
