<?php

namespace App\Filament\Resources\Marketplace\Stores\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Models\Category;
use Illuminate\Support\Str;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات المتجر الأساسية')
                    ->description('أدخل التفاصيل الأساسية للمتجر')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->label('صاحب المتجر')
                                    ->required()
                                    ->searchable(),

                                TextInput::make('store_name')
                                    ->label('اسم المتجر')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->label('الرابط المختصر (Slug)')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                Select::make('store_type')
                                    ->label('نوع المتجر')
                                    ->options(Category::marketplace()->pluck('name', 'name'))
                                    ->required(),

                                Select::make('status')
                                    ->label('حالة المتجر')
                                    ->options([
                                        'pending' => 'قيد المراجعة',
                                        'verified' => 'موثق',
                                        'rejected' => 'مرفوض',
                                    ])
                                    ->default('pending')
                                    ->required(),
                            ]),

                        Textarea::make('description')
                            ->label('وصف المتجر')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('الموقع الجغرافي')
                    ->schema([
                        TextInput::make('address')
                            ->label('العنوان')
                            ->placeholder('مثال: صنعاء - شارع الخمسين'),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('latitude')
                                    ->label('خط العرض (Latitude)')
                                    ->numeric(),
                                TextInput::make('longitude')
                                    ->label('خط الطول (Longitude)')
                                    ->numeric(),
                            ]),
                    ]),

                Section::make('الوسائط')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                FileUpload::make('logo')
                                    ->label('شعار المتجر')
                                    ->image()
                                    ->disk('public')
                                    ->directory('stores/logos')
                                    ->maxSize(1024),

                                FileUpload::make('cover')
                                    ->label('غلاف المتجر')
                                    ->image()
                                    ->disk('public')
                                    ->directory('stores/covers')
                                    ->maxSize(2048),
                            ]),
                    ]),
            ]);
    }
}
