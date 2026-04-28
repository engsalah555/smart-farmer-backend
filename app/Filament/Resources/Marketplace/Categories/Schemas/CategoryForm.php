<?php

namespace App\Filament\Resources\Marketplace\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات القسم')
                    ->description('أدخل تفاصيل قسم المتجر')
                    ->icon('heroicon-o-tag')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('store_id')
                                    ->label('المتجر')
                                    ->relationship('store', 'name')
                                    ->searchable()
                                    ->required()
                                    ->preload(),

                                TextInput::make('name')
                                    ->label('اسم القسم')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('slug')
                                    ->label('الرابط المختصر')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                TextInput::make('sort_order')
                                    ->label('ترتيب العرض')
                                    ->numeric()
                                    ->default(0),
                            ]),

                        Textarea::make('description')
                            ->label('الوصف')
                            ->rows(3)
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->label('صورة القسم')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('categories')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
