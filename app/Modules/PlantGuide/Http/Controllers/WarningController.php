<?php

namespace App\Modules\PlantGuide\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponder;
use App\Modules\PlantGuide\Domain\Models\Warning;
use Illuminate\Http\JsonResponse;

class WarningController extends Controller
{
    use ApiResponder;

    /**
     * GET /warnings
     * جلب التحذيرات النشطة غير المنتهية الصلاحية.
     */
    public function getActiveWarnings(): JsonResponse
    {
        // ✅ تمت إزالة كود الـ Seeding — انقله إلى WarningSeeder
        $warnings = Warning::where('active', true)
            ->where(function ($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->success($warnings);
    }
}
