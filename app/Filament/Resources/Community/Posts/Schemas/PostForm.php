<?php

namespace App\Filament\Resources\Community\Posts\Schemas;

use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('محتوى المنشور')
                    ->description('أدخل تفاصيل المنشور الذي سيتم عرضه في المنتدى الزراعي')
                    ->icon('heroicon-o-pencil-square')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('user_id')
                                    ->label('الناشر')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->required()
                                    ->preload(),

                                TextInput::make('title')
                                    ->label('العنوان')
                                    ->required()
                                    ->maxLength(255),
                            ]),

                        RichEditor::make('content')
                            ->label('المحتوى')
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('is_hidden')
                            ->label('إخفاء المنشور')
                            ->helperText('عند تفعيل هذا الخيار، لن يظهر المنشور للمستخدمين')
                            ->default(false),
                    ]),

                Section::make('الوسائط')
                    ->description('أضف الصور المتعلقة بالمنشور')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image_url')
                            ->label('الصورة')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('community/posts')
                            ->dehydrateStateUsing(fn ($state) => $state)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
