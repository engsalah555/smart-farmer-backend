<?php

namespace App\Filament\Resources\PlantGuide\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;

class PlantCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('اسم التصنيف')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('icon')
                    ->label('الأيقونة')
                    ->maxLength(255),

                Hidden::make('type')
                    ->default('crop'),
            ]);
    }
}
