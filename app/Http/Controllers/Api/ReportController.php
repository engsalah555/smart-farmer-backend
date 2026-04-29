<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    use ApiResponder;

    /**
     * GET /reports/statistics
     * إحصائيات المستخدم للـ 7 أيام الأخيرة.
     *
     * ✅ تم إصلاح N+1: بدلاً من 31 query، نستخدم aggregate queries مُجمَّعة
     */
    public function getStatistics(Request $request): JsonResponse
    {
        $userId = $request->user()->id;

        return Cache::remember("user_stats_{$userId}", 300, function () use ($userId) {
            // --- 1. جلب الإحصائيات الثابتة مرة واحدة ---
            $summary = DB::table('crops')
                ->where('user_id', $userId)
                ->selectRaw('
                    COUNT(*) as total_crops,
                    COALESCE(AVG(health_status), 0.85) as avg_health,
                    SUM(CASE WHEN needs_irrigation = 1 THEN 1 ELSE 0 END) as needs_irrigation
                ')
                ->first();

            $totalCrops = (int) ($summary->total_crops ?? 0);
            $avgHealth = (float) ($summary->avg_health ?? 0.85);
            $needsIrrigation = (int) ($summary->needs_irrigation ?? 0);

            // --- 2. جلب بيانات الري لآخر 7 أيام بـ query واحدة ---
            $sevenDaysAgo = \Illuminate\Support\Carbon::now()->subDays(6)->startOfDay();

            $irrigationByDay = DB::table('crops')
                ->where('user_id', $userId)
                ->whereDate('last_irrigation', '>=', $sevenDaysAgo)
                ->selectRaw('DATE(last_irrigation) as day, COUNT(*) as irrigated_count')
                ->groupBy('day')
                ->pluck('irrigated_count', 'day');

            // --- 3. بناء مصفوفة 7 أيام ---
            $days = [];
            $waterConsumption = [];
            $soilMoisture = [];
            $cropHealth = [];

            $baseWater = $totalCrops > 0 ? ($totalCrops * 8) : 40;
            $moistureBase = $totalCrops > 0
                ? max(40, 90 - (($needsIrrigation / max($totalCrops, 1)) * 40))
                : 70;

            for ($i = 6; $i >= 0; $i--) {
                $date = \Illuminate\Support\Carbon::now()->subDays($i);
                $dateKey = $date->toDateString();
                $days[] = $date->format('y-m-d');

                $irrigatedCount = (int) ($irrigationByDay[$dateKey] ?? 0);
                $waterConsumption[] = round($baseWater + ($irrigatedCount * 15));
                $soilMoisture[] = round($moistureBase);
                $cropHealth[] = round($avgHealth * 100);
            }

            return $this->success([
                'labels' => $days,
                'water_consumption' => $waterConsumption,
                'soil_moisture' => $soilMoisture,
                'crop_health' => $cropHealth,
                'summary' => [
                    'total_crops' => $totalCrops,
                    'needs_irrigation' => $needsIrrigation,
                    'avg_health' => round($avgHealth * 100),
                ],
            ]);
        });
    }
}
