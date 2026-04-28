<?php

namespace App\Modules\PlantGuide\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\PlantGuide\Domain\Models\CropGuide;
use App\Services\CropGuideService;

class CropGuideController extends Controller
{
    protected $cropGuideService;

    public function __construct(CropGuideService $cropGuideService)
    {
        $this->cropGuideService = $cropGuideService;
    }

    /**
     * Display a listing of crop guides.
     */
    public function index(Request $request)
    {
        $query = CropGuide::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('scientific_name', 'LIKE', "%{$search}%");
        }

        $guides = $query->latest()->take(20)->get();

        return response()->json([
            'success' => true,
            'data' => $guides
        ]);
    }

    /**
     * Search remotely using service logic.
     */
    public function search(Request $request)
    {
        $request->validate(['query' => 'required|string|min:2']);
        
        $result = $this->cropGuideService->searchGuide(trim($request->input('query')));

        if ($result) {
            return response()->json([
                'success' => true,
                'data' => [$result['guide']],
                'source' => $result['source']
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'لم نتمكن من العثور على معلومات حول هذا النبات حالياً.'
        ], 404);
    }
}
