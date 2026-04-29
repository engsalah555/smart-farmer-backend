<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Modules\Community\Domain\Models\Post;
use App\Modules\Iot\Domain\Models\IotDevice;
use App\Modules\Marketplace\Domain\Models\Order;
use App\Modules\PlantGuide\Domain\Models\Crop;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        // 1. Sales Trend (Last 7 days)
        $salesData = Order::where('payment_status', 'paid')
            ->where('created_at', '>=', now()->subDays(7))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(total_price) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total')
            ->toArray();

        $currentMonthSales = Order::where('payment_status', 'paid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total_price');
        
        $lastMonthSales = Order::where('payment_status', 'paid')
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->sum('total_price');

        $salesTrend = $lastMonthSales > 0 ? (($currentMonthSales - $lastMonthSales) / $lastMonthSales) * 100 : 0;

        // 2. Users Trend (Last 7 days)
        $usersData = User::where('created_at', '>=', now()->subDays(7))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('count')
            ->toArray();

        $currentMonthUsers = User::whereMonth('created_at', Carbon::now()->month)->count();
        $lastMonthUsers = User::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
        $usersTrend = $lastMonthUsers > 0 ? (($currentMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100 : 0;

        // 3. Crops & Community
        $totalCrops = Crop::count();
        $totalPosts = Post::count();
        $activeDevices = IotDevice::where('status', 'online')->count();

        return [
            Stat::make('إجمالي المبيعات', number_format($currentMonthSales, 0) . ' ر.ي')
                ->description($salesTrend >= 0 ? number_format(abs($salesTrend), 1) . '% زيادة' : number_format(abs($salesTrend), 1) . '% نقص')
                ->descriptionIcon($salesTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->chart(count($salesData) > 0 ? $salesData : [0, 0])
                ->color($salesTrend >= 0 ? 'success' : 'danger'),

            Stat::make('المزارعين المشتركين', User::count())
                ->description($usersTrend >= 0 ? '+' . $currentMonthUsers . ' هذا الشهر' : $currentMonthUsers . ' هذا الشهر')
                ->descriptionIcon('heroicon-m-users')
                ->chart(count($usersData) > 0 ? $usersData : [0, 0])
                ->color('info'),

            Stat::make('إجمالي المحاصيل', $totalCrops)
                ->description('محاصيل مسجلة في النظام')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success'),

            Stat::make('نشاط المجتمع', $totalPosts)
                ->description('منشورات وتفاعلات')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('warning'),

            Stat::make('أجهزة IoT النشطة', $activeDevices)
                ->description('أجهزة متصلة الآن')
                ->descriptionIcon('heroicon-m-cpu-chip')
                ->color($activeDevices > 0 ? 'success' : 'gray'),
            
            Stat::make('الطلبات الجديدة', Order::where('status', 'pending')->count())
                ->description('بانتظار المراجعة')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('danger'),
        ];
    }
}

