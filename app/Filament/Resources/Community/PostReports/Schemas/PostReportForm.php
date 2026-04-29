<?php

namespace App\Filament\Resources\Community\PostReports\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostReportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('تفاصيل البلاغ')
                    ->description('مراجعة البلاغ المقدم ضد المنشور')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('post_id')
                                    ->label('المنشور')
                                    ->relationship('post', 'title')
                                    ->disabled()
                                    ->required(),

                                Select::make('user_id')
                                    ->label('المبلغ')
                                    ->relationship('user', 'name')
                                    ->disabled()
                                    ->required(),

                                TextInput::make('reason')
                                    ->label('سبب البلاغ')
                                    ->disabled(),

                                Select::make('status')
                                    ->label('حالة البلاغ')
                                    ->options([
                                        'pending' => 'قيد المراجعة',
                                        'resolved' => 'تم الحل',
                                        'dismissed' => 'تم التجاهل',
                                    ])
                                    ->required(),
                            ]),

                        Textarea::make('details')
                            ->label('تفاصيل إضافية')
                            ->disabled()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
