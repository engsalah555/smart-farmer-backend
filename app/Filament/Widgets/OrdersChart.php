<?php

namespace App\Filament\Widgets;

use App\Modules\Marketplace\Domain\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrdersChart extends ChartWidget
{
    protected ?string $heading = 'نمو المبيعات الشهري';

    protected static ?int $sort = 2;

    protected ?string $pollingInterval = '30s';

    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 2,
    ];

    public ?string $filter = 'year';

    protected function getData(): array
    {
        $data = Order::select(
            DB::raw('sum(total_price) as total'),
            DB::raw("DATE_FORMAT(created_at, '%m') as month")
        )
            ->where('payment_status', 'paid')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total', 'month')
            ->toArray();

        // Fill missing months with 0
        $months = [];
        $sales = [];
        for ($m = 1; $m <= 12; $m++) {
            $monthKey = str_pad($m, 2, '0', STR_PAD_LEFT);
            $months[] = Carbon::create()->month($m)->translatedFormat('F');
            $sales[] = $data[$monthKey] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'المبيعات (ر.ي)',
                    'data' => $sales,
                    'fill' => 'start',
                    'tension' => 0.4,
                    'borderColor' => '#10b981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
