<?php

namespace App\Filament\Resources\Marketplace\Orders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('معلومات الطلب')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->label('المشتري')
                                    ->required()
                                    ->searchable(),

                                Select::make('store_id')
                                    ->relationship('store', 'store_name')
                                    ->label('المتجر')
                                    ->required()
                                    ->searchable(),

                                TextInput::make('total_price')
                                    ->label('إجمالي السعر')
                                    ->numeric()
                                    ->prefix('﷼')
                                    ->required(),

                                Select::make('status')
                                    ->label('حالة الطلب')
                                    ->options([
                                        'pending' => 'قيد الانتظار',
                                        'confirmed' => 'تم التأكيد',
                                        'processing' => 'قيد التجهيز',
                                        'shipped' => 'تم الشحن',
                                        'delivered' => 'تم التوصيل',
                                        'cancelled' => 'ملغي',
                                    ])
                                    ->required(),
                            ]),
                    ]),

                Section::make('الدفع والشحن')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('payment_method')
                                    ->label('طريقة الدفع')
                                    ->options([
                                        'cash' => 'نقدًا (عند الاستلام)',
                                        'transfer' => 'تحويل بنكي',
                                        'wallet' => 'المحفظة',
                                    ])
                                    ->required(),

                                Select::make('payment_status')
                                    ->label('حالة الدفع')
                                    ->options([
                                        'pending' => 'قيد الانتظار',
                                        'paid' => 'تم الدفع',
                                        'failed' => 'فشل الدفع',
                                    ])
                                    ->required(),

                                TextInput::make('transaction_id')
                                    ->label('رقم المعاملة (إن وجد)')
                                    ->columnSpanFull(),

                                TextInput::make('phone_number')
                                    ->label('رقم هاتف المشتري')
                                    ->tel()
                                    ->required(),

                                TextInput::make('shipping_address')
                                    ->label('عنوان الشحن')
                                    ->required(),
                            ]),

                        Textarea::make('notes')
                            ->label('ملاحظات إضافية')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('وصل الدفع')
                    ->schema([
                        FileUpload::make('receipt_image')
                            ->label('صورة الوصل (للتحويل)')
                            ->image()
                            ->directory('order-receipts'),
                    ]),
            ]);
    }
}
