<?php

namespace App\Modules\PlantGuide\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Modules\PlantGuide\Domain\Models\Plant;
use App\Modules\PlantGuide\Domain\Models\Category;
use App\Http\Resources\PlantResource;
use App\Http\Resources\CategoryResource;
class PlantController extends Controller
{
    use \App\Traits\ApiResponder;

    public function index(Request $request)
    {
        $perPage = (int) $request->input('per_page', 20);
        $query   = Plant::with(['category', 'careGuide', 'media']);

        // Search by name
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('common_name', 'like', "%{$search}%")
                  ->orWhere('scientific_name', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // Filter by difficulty
        if ($request->has('difficulty_level')) {
            $query->where('difficulty_level', $request->input('difficulty_level'));
        }

        $plants = $query->latest()->paginate($perPage);

        return $this->paginated($plants, PlantResource::class);
    }

    public function show($id)
    {
        $plant = Plant::with(['category', 'careGuide', 'media'])->findOrFail($id);
        return (new PlantResource($plant))->additional([
            'success' => true
        ]);
    }

    public function categories()
    {
        $categories = Category::crop()->get();
        return CategoryResource::collection($categories)->additional([
            'success' => true
        ]);
    }
}
