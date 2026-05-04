<?php

namespace App\Modules\PlantGuide\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Farm\Application\Services\CropService;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    use ApiResponder;

    public function __construct(protected CropService $cropService) {}

    public function getMyCrops(Request $request)
    {
        return $this->success($this->cropService->getUserCrops($request->user()));
    }

    public function addCrop(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'crop_type' => 'required|string',
            'plant_id' => 'nullable|exists:plants,id',
        ]);

        try {
            // تمرير حقول محددة فقط — يمنع Mass Assignment
            $crop = $this->cropService->addCrop(
                $request->user(),
                $request->only(['name', 'crop_type', 'plant_id'])
            );

            return $this->success($crop, 'تمت إضافة المحصول بنجاح', 201);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 400);
        }
    }

    public function deleteCrop(Request $request, $id)
    {
        try {
            $this->cropService->removeCrop($request->user(), $id);

            return $this->success(null, 'تم حذف المحصول بنجاح');
        } catch (\Exception $e) {
            return $this->error('المحصول غير موجود', 404);
        }
    }
}
