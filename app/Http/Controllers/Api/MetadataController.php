<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class MetadataController extends Controller
{
    /**
     * Get all application metadata (categories, units, payment methods, etc.)
     * This serves as the single source of truth for the mobile app.
     */
    public function index()
    {
        return $this->success([
            'marketplace' => [
                'categories' => Category::marketplace()->get()->map(fn ($cat) => [
                    'id' => $cat->name,
                    'label' => $cat->name,
                    'icon' => $cat->icon ?? 'default',
                ]),
                'units' => \DB::table('units')->pluck('name'),
                'payment_methods' => \DB::table('payment_methods')
                    ->where('is_active', true)
                    ->get(['identifier as id', 'label', 'icon']),
            ],
            'app_info' => [
                'version' => config('app.version', '2.0.0'),
                'contact_email' => 'support@smartfarm.sa',
                'terms_url' => 'https://smartfarm.sa/terms',
                'privacy_url' => 'https://smartfarm.sa/privacy',
            ],
        ]);
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
