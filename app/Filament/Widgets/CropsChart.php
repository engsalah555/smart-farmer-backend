<?php

namespace App\Filament\Widgets;

use App\Modules\PlantGuide\Domain\Models\Crop;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CropsChart extends ChartWidget
{
    protected ?string $heading = 'توزيع المحاصيل حسب النوع';

    protected static ?int $sort = 5;

    protected ?string $pollingInterval = '30s';

    protected int|string|array $columnSpan = [
        'md' => 1,
        'xl' => 1,
    ];

    protected function getData(): array
    {
        $data = Crop::select('crop_type', DB::raw('count(*) as count'))
            ->groupBy('crop_type')
            ->get();

        if ($data->isEmpty()) {
            return [
                'datasets' => [
                    [
                        'label' => 'لا يوجد بيانات',
                        'data' => [0],
                        'backgroundColor' => ['#94a3b8'],
                    ],
                ],
                'labels' => ['لا يوجد محاصيل مسجلة'],
            ];
        }

        return [
            'datasets' => [
                [
                    'label' => 'عدد المحاصيل',
                    'data' => $data->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#10b981', // emerald
                        '#3b82f6', // blue
                        '#f59e0b', // amber
                        '#ef4444', // red
                        '#8b5cf6', // violet
                    ],
                ],
            ],
            'labels' => $data->pluck('crop_type')->map(fn ($type) => $type ?? 'غير محدد')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
