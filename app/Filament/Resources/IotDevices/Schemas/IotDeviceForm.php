<?php

namespace App\Filament\Resources\IotDevices\Schemas;

use Filament\Schemas\Schema;

class IotDeviceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('معلومات الجهاز')
                    ->schema([
                        \Filament\Forms\Components\Select::make('user_id')
                            ->label('المستخدم المالك')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->required(),
                        
                        \Filament\Forms\Components\TextInput::make('device_id')
                            ->label('معرف الجهاز (ID)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                            
                        \Filament\Forms\Components\TextInput::make('name')
                            ->label('اسم الجهاز')
                            ->required()
                            ->maxLength(255),
                            
                        \Filament\Forms\Components\Select::make('status')
                            ->label('حالة الجهاز')
                            ->options([
                                'active' => 'نشط',
                                'inactive' => 'غير نشط',
                                'maintenance' => 'صيانة',
                            ])
                            ->required(),
                    ])->columns(2),

                \Filament\Schemas\Components\Section::make('التحكم والاستهلاك')
                    ->schema([
                        \Filament\Forms\Components\Toggle::make('is_irrigation_on')
                            ->label('تشغيل الري يدوياً')
                            ->onIcon('heroicon-m-bolt')
                            ->offIcon('heroicon-m-bolt-slash'),
                            
                        \Filament\Forms\Components\Toggle::make('auto_irrigation')
                            ->label('الري التلقائي')
                            ->default(true),
                            
                        \Filament\Forms\Components\TextInput::make('water_consumption')
                            ->label('استهلاك المياه (لتر)')
                            ->numeric()
                            ->default(0.00),
                    ])->columns(3),
            ]);
    }
}
