<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Modules\Marketplace\Domain\Models\Order;
use App\Modules\Marketplace\Domain\Models\Store;
use App\Modules\PlantGuide\Domain\Models\Crop;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalSales = Order::query()
            ->where('payment_status', 'paid')
            ->sum('total_price');

        return [
            Stat::make('إجمالي المبيعات', number_format($totalSales, 2) . ' ريال يمني')
                ->description('إجمالي المبيعات المؤكدة')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),
            Stat::make('المستخدمين', User::count())
                ->description('إجمالي مستخدمي التطبيق')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
            Stat::make('المتاجر', Store::count())
                ->description('المتاجر المسجلة في النظام')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('warning'),
            Stat::make('المحاصيل النشطة', Crop::count())
                ->description('محاصيل يتم تتبعها حالياً')
                ->descriptionIcon('heroicon-m-sun')
                ->color('success'),
        ];
    }
}
