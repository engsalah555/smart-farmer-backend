<?php

namespace App\Filament\Resources\IotDevices\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class IotDeviceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات الجهاز')
                    ->schema([
                        Select::make('user_id')
                            ->label('المستخدم المالك')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->required(),

                        TextInput::make('device_id')
                            ->label('معرف الجهاز (ID)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('name')
                            ->label('اسم الجهاز')
                            ->required()
                            ->maxLength(255),

                        Select::make('status')
                            ->label('حالة الجهاز')
                            ->options([
                                'active' => 'نشط',
                                'inactive' => 'غير نشط',
                                'maintenance' => 'صيانة',
                            ])
                            ->required(),
                    ])->columns(2),

                Section::make('التحكم والاستهلاك')
                    ->schema([
                        Toggle::make('is_irrigation_on')
                            ->label('تشغيل الري يدوياً')
                            ->onIcon('heroicon-m-bolt')
                            ->offIcon('heroicon-m-bolt-slash'),

                        Toggle::make('auto_irrigation')
                            ->label('الري التلقائي')
                            ->default(true),

                        TextInput::make('water_consumption')
                            ->label('استهلاك المياه (لتر)')
                            ->numeric()
                            ->default(0.00),
                    ])->columns(3),
            ]);
    }
}
