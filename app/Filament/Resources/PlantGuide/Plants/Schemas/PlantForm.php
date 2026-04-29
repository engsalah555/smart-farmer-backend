<?php

namespace App\Filament\Resources\PlantGuide\Plants\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PlantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('المعلومات الأساسية')
                    ->description('تعريف النبات وأسماؤه')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('common_name')
                                    ->label('الاسم الشائع')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('scientific_name')
                                    ->label('الاسم العلمي')
                                    ->maxLength(255),
                            ]),

                        RichEditor::make('description')
                            ->label('الوصف')
                            ->columnSpanFull(),
                    ]),

                Section::make('دليل النمو')
                    ->description('ظروف الزراعة والنمو المثالية')
                    ->icon('heroicon-o-sun')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('difficulty_level')
                                    ->label('مستوى الصعوبة')
                                    ->placeholder('مثال: سهل، متوسط')
                                    ->maxLength(255),

                                TextInput::make('planting_season')
                                    ->label('موسم الزراعة')
                                    ->maxLength(255),

                                TextInput::make('water_needs')
                                    ->label('الاحتياجات المائية')
                                    ->maxLength(255),
                            ]),

                        RichEditor::make('growth_guide')
                            ->label('دليل النمو الخطوة بخطوة')
                            ->columnSpanFull(),

                        RichEditor::make('growing_conditions')
                            ->label('ظروف النمو (الضوء، الحرارة)')
                            ->columnSpanFull(),
                    ]),

                Section::make('الفوائد والاستخدامات')
                    ->description('لماذا نزرع هذا النبات؟')
                    ->icon('heroicon-o-beaker')
                    ->schema([
                        RichEditor::make('benefits')
                            ->label('الفوائد')
                            ->columnSpanFull(),

                        RichEditor::make('uses')
                            ->label('الاستخدامات')
                            ->columnSpanFull(),
                    ]),

                Section::make('الصور والوسائط')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image')
                            ->label('صورة النبات الرئيسية')
                            ->image()
                            ->disk('public')
                            ->directory('plants')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
