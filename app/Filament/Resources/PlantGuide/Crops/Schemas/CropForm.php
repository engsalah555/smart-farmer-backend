<?php

namespace App\Filament\Resources\PlantGuide\Crops\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CropForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تفاصيل المحصول')
                    ->description('إدارة بيانات المحصول المزروع لدى المستخدم')
                    ->icon('heroicon-o-variable')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('user_id')
                                    ->label('المزارع')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->required()
                                    ->preload(),

                                TextInput::make('name')
                                    ->label('اسم المحصول')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('crop_type')
                                    ->label('نوع المحصول')
                                    ->maxLength(255),

                                DatePicker::make('plantation_date')
                                    ->label('تاريخ الزراعة')
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('health_status')
                                    ->label('نسبة الحالة الصحية (%)')
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->default(100),

                                DateTimePicker::make('last_irrigation')
                                    ->label('آخر ري')
                                    ->disabled(),
                            ]),

                        Toggle::make('needs_irrigation')
                            ->label('يحتاج للري')
                            ->default(false),
                    ]),
            ]);
    }
}
