<?php

namespace App\Filament\Resources\Verifications;

use App\Filament\Resources\Verifications\Pages\ListVerificationRequests;
use App\Filament\Resources\Verifications\Tables\VerificationRequestsTable;
use App\Models\VerificationRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;

class VerificationRequestResource extends Resource
{
    protected static ?string $model = VerificationRequest::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shield-check';

    public static function getNavigationGroup(): ?string
    {
        return 'إدارة النظام';
    }

    public static function getNavigationLabel(): string
    {
        return 'طلبات التوثيق';
    }

    public static function getModelLabel(): string
    {
        return 'طلب توثيق';
    }

    public static function getPluralModelLabel(): string
    {
        return 'طلبات التوثيق';
    }

    public static function table(Table $table): Table
    {
        return VerificationRequestsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVerificationRequests::route('/'),
        ];
    }
}
