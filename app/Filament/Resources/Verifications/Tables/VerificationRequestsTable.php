<?php

namespace App\Filament\Resources\Verifications\Tables;

use App\Models\VerificationRequest;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Textarea;

class VerificationRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label('المستخدم')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('document_type')
                    ->label('نوع الوثيقة')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'national_id' => 'هوية وطنية',
                        'license' => 'رخصة',
                        default => 'أخرى',
                    }),

                ImageColumn::make('document_path')
                    ->label('الوثيقة')
                    ->width(100)
                    ->height(100),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'قيد الانتظار',
                        'approved' => 'مقبول',
                        'rejected' => 'مرفوض',
                        default => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('تاريخ الطلب')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->actions([
                Action::make('approve')
                    ->label('قبول')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->hidden(fn (VerificationRequest $record) => $record->status !== 'pending')
                    ->requiresConfirmation()
                    ->action(function (VerificationRequest $record) {
                        $record->update(['status' => 'approved']);
                        $record->user->update(['is_verified' => true]);
                    }),

                Action::make('reject')
                    ->label('رفض')
                    ->color('danger')
                    ->icon('heroicon-o-x-mark')
                    ->hidden(fn (VerificationRequest $record) => $record->status !== 'pending')
                    ->form([
                        Textarea::make('admin_notes')
                            ->label('ملاحظات الرفض')
                            ->required(),
                    ])
                    ->action(function (VerificationRequest $record, array $data) {
                        $record->update([
                            'status' => 'rejected',
                            'admin_notes' => $data['admin_notes'],
                        ]);
                    }),
            ]);
    }
}
