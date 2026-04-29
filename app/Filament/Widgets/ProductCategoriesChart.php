<?php

namespace App\Filament\Widgets;

use App\Modules\Marketplace\Domain\Models\Product;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ProductCategoriesChart extends ChartWidget
{
    protected ?string $heading = 'توزيع المنتجات حسب التصنيف';
    protected static ?int $sort = 3;
    protected ?string $pollingInterval = '30s';
    protected int | string | array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    protected function getData(): array
    {
        $data = Product::select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'عدد المنتجات',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#10b981', // emerald
                        '#3b82f6', // blue
                        '#f59e0b', // amber
                        '#ef4444', // red
                        '#8b5cf6', // violet
                        '#ec4899', // pink
                        '#06b6d4', // cyan
                        '#f97316', // orange
                    ],
                ],
            ],
            'labels' => $data->pluck('category')->map(fn($cat) => $cat ?? 'غير مصنف')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
