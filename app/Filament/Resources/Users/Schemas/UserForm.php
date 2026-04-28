<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات الحساب')
                    ->description('البيانات الأساسية للمستخدم وصلاحياته')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('الاسم الكامل')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->label('البريد الإلكتروني')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('phone')
                                    ->label('رقم الهاتف')
                                    ->tel()
                                    ->maxLength(255),

                                Select::make('user_type')
                                    ->label('نوع المستخدم')
                                    ->options([
                                        'user' => 'مزارع',
                                        'seller' => 'تاجر',
                                        'admin' => 'مدير نظام',
                                    ])
                                    ->required(),
                            ]),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('password')
                                    ->label('كلمة المرور')
                                    ->password()
                                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->required(fn (string $context): bool => $context === 'create'),

                                TextInput::make('custom_title')
                                    ->label('اللقب / الرسالة الترحيبية')
                                    ->placeholder('مثال: المزارع النشط')
                                    ->maxLength(255),
                            ]),

                        Toggle::make('is_verified')
                            ->label('توثيق الحساب (إشارة الصح)')
                            ->helperText('عند التفعيل، ستظهر إشارة التوثيق بجانب اسم المستخدم')
                            ->default(false),
                    ]),

                Section::make('الصورة الشخصية')
                    ->icon('heroicon-o-camera')
                    ->schema([
                        FileUpload::make('profile_image')
                            ->label('الصورة الشخصية')
                            ->image()
                            ->directory('profiles')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
