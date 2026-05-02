<?php

namespace App\Filament\Resources\Marketplace\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات المنتج')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('اسم المنتج')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->label('الرابط المختصر (Slug)')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                Select::make('store_id')
                                    ->relationship('store', 'store_name')
                                    ->label('المتجر')
                                    ->required()
                                    ->searchable(),

                                Select::make('catalog_id')
                                    ->relationship('catalog', 'name')
                                    ->label('القسم (الكتالوج)')
                                    ->searchable(),

                                Select::make('category')
                                    ->label('الفئة العامة')
                                    ->options([
                                        'seeds' => 'بذور',
                                        'fertilizers' => 'أسمدة',
                                        'pesticides' => 'مبيدات',
                                        'crops' => 'محاصيل',
                                        'tools' => 'معدات',
                                        'nurseries' => 'مشاتل',
                                        'other' => 'أخرى',
                                    ])
                                    ->required(),

                                Toggle::make('is_featured')
                                    ->label('منتج مميز')
                                    ->inline(false),
                            ]),

                        Textarea::make('description')
                            ->label('وصف المنتج')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

                Section::make('التسعير والمخزون')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('price')
                                    ->label('السعر (ريال)')
                                    ->numeric()
                                    ->prefix('﷼')
                                    ->required(),

                                TextInput::make('unit')
                                    ->label('الوحدة')
                                    ->placeholder('كجم، كيس، حبة...')
                                    ->required(),

                                TextInput::make('stock_quantity')
                                    ->label('الكمية المتوفرة')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                            ]),
                    ]),

                Section::make('صور المنتج')
                    ->schema([
                        FileUpload::make('image')
                            ->label('الصورة الرئيسية')
                            ->image()
                            ->disk('public')
                            ->directory('products/main'),

                        FileUpload::make('gallery')
                            ->label('معرض الصور')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->disk('public')
                            ->directory('products/gallery'),
                    ]),
            ]);
    }
}
