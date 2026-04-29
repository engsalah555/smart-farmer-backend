<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Modules\Marketplace\Domain\Models\Order;
use App\Modules\Marketplace\Domain\Models\Store;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        // 1. Sales Calculation & Trend
        $currentMonthSales = Order::where('payment_status', 'paid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_price');
        
        $lastMonthSales = Order::where('payment_status', 'paid')
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->sum('total_price');

        $salesTrend = $lastMonthSales > 0 ? (($currentMonthSales - $lastMonthSales) / $lastMonthSales) * 100 : 0;

        // 2. Users Calculation & Trend
        $currentMonthUsers = User::whereMonth('created_at', Carbon::now()->month)->count();
        $lastMonthUsers = User::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
        $usersTrend = $lastMonthUsers > 0 ? (($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100 : 0;

        // 3. Orders Calculation
        $pendingOrders = Order::where('status', 'pending')->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();

        return [
            Stat::make('إجمالي المبيعات (الشهر الحالي)', number_format($currentMonthSales, 0) . ' ر.ي')
                ->description($salesTrend >= 0 ? number_format(abs($salesTrend), 1) . '% زيادة عن الشهر الماضي' : number_format(abs($salesTrend), 1) . '% نقص عن الشهر الماضي')
                ->descriptionIcon($salesTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart([7, 2, 10, 3, 15, 4, 17]) // Dummy data for trend line
                ->color($salesTrend >= 0 ? 'success' : 'danger'),

            Stat::make('مستخدمين جدد', $currentMonthUsers)
                ->description($usersTrend >= 0 ? number_format(abs($usersTrend), 1) . '% نمو' : number_format(abs($usersTrend), 1) . '% تراجع')
                ->descriptionIcon($usersTrend >= 0 ? 'heroicon-m-user-plus' : 'heroicon-m-user-minus')
                ->chart([3, 5, 2, 8, 4, 12, 15])
                ->color($usersTrend >= 0 ? 'success' : 'warning'),

            Stat::make('الطلبات النشطة', $pendingOrders)
                ->description('بانتظار التجهيز والشحن')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('info'),

            Stat::make('طلبات مكتملة', $deliveredOrders)
                ->description('تم التوصيل بنجاح')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
        ];
    }
}
