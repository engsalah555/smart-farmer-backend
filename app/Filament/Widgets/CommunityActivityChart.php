<?php

namespace App\Filament\Widgets;

use App\Modules\Community\Domain\Models\Comment;
use App\Modules\Community\Domain\Models\Post;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommunityActivityChart extends ChartWidget
{
    protected ?string $heading = 'نشاط المجتمع (آخر 30 يوم)';

    protected static ?int $sort = 6;

    protected ?string $pollingInterval = '60s';

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $days = collect(range(29, 0))->map(fn ($i) => now()->subDays($i)->format('Y-m-d'));

        $posts = Post::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->pluck('count', 'date');

        $comments = Comment::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->pluck('count', 'date');

        return [
            'datasets' => [
                [
                    'label' => 'المنشورات',
                    'data' => $days->map(fn ($date) => $posts->get($date, 0))->toArray(),
                    'borderColor' => '#3b82f6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => 'start',
                ],
                [
                    'label' => 'التعليقات',
                    'data' => $days->map(fn ($date) => $comments->get($date, 0))->toArray(),
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.1)',
                    'fill' => 'start',
                ],
            ],
            'labels' => $days->map(fn ($date) => Carbon::parse($date)->translatedFormat('d M'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
