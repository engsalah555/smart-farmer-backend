<?php

namespace App\Filament\Resources\Marketplace\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Schemas\Schema;

class MarketplaceCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('معلومات التصنيف')
                    ->description('أدخل تفاصيل تصنيف المتجر هنا')
                    ->schema([
                        TextInput::make('name')
                            ->label('الاسم')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('icon')
                            ->label('الأيقونة (Material Icon name)')
                            ->required(),
                        TextInput::make('type')
                            ->label('النوع')
                            ->default('marketplace')
                            ->disabled()
                            ->dehydrated(),
                        Textarea::make('description')
                            ->label('الوصف')
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }
}
