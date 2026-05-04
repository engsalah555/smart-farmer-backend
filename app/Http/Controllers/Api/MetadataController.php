<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;
class MetadataController extends Controller
{
    /**
     * Get all application metadata (categories, units, payment methods, etc.)
     * This serves as the single source of truth for the mobile app.
     */
    public function index()
    {
        $metadata = \Illuminate\Support\Facades\Cache::remember('app_metadata', 3600, function () {
            return [
                'marketplace' => [
                'categories' => Category::marketplace()->get()->map(function ($cat) {
                        // خريطة لتحويل الاسم العربي إلى ID إنجليزي موحد
                        $slugMap = [
                            'بذور زراعية'     => 'seeds',
                            'أسمدة'           => 'fertilizers',
                            'مبيدات زراعية'   => 'pesticides',
                            'أنظمة ري وطاقة'  => 'irrigation',
                            'معدات وأدوات'    => 'tools',
                            'مشاتل'           => 'nurseries',
                            'منتجات زراعية'   => 'products',
                        ];
                        return [
                            'id'    => $slugMap[$cat->name] ?? \Illuminate\Support\Str::slug($cat->name),
                            'label' => $cat->name,
                            'icon'  => $cat->icon ?? 'default',
                        ];
                    }),
                    'units' => DB::table('units')->pluck('name'),
                    'payment_methods' => PaymentMethod::where('is_active', true)
                        ->orderBy('id')
                        ->get()
                        ->map(fn ($pm) => [
                            'id' => $pm->identifier,
                            'label' => $pm->label,
                            'icon' => $pm->icon,
                        ]),
                ],
                'app_info' => [
                    'version' => config('app.version', '2.0.0'),
                    'contact_email' => 'support@smartfarm.sa',
                    'terms_url' => 'https://smartfarm.sa/terms',
                    'privacy_url' => 'https://smartfarm.sa/privacy',
                ],
            ];
        });

        return $this->success($metadata);
    }

    /**
     * Get the current app version information.
     */
    public function appVersion()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'version' => config('app.version', '2.0.0'),
                'build_number' => 1,
                'force_update' => false,
            ],
        ]);
    }
}
