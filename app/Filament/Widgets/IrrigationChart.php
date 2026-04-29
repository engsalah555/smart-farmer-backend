<?php

namespace App\Filament\Widgets;

use App\Modules\Iot\Domain\Models\IrrigationLog;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IrrigationChart extends ChartWidget
{
    protected ?string $heading = 'استهلاك المياه (آخر 7 أيام)';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 2,
    ];

    protected function getData(): array
    {
        $data = IrrigationLog::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('sum(water_used) as total')
        )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('total', 'date')
            ->toArray();

        $days = [];
        $water = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $days[] = Carbon::parse($date)->translatedFormat('l');
            $water[] = $data[$date] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'المياه المستخدمة (لتر)',
                    'data' => $water,
                    'borderColor' => '#34d399',
                    'backgroundColor' => 'rgba(52, 211, 153, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => $days,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
