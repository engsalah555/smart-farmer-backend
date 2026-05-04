<?php

namespace App\Services;

use App\Modules\PlantGuide\Domain\Models\Crop;
use App\Models\User;

class FarmService
{
    /**
     * Get user's crops.
     */
    public function getUserCrops($user)
    {
        return $user->crops()->latest()->get();
    }

    /**
     * Add a crop to user's farm.
     */
    public function addCropToFarm($user, array $data)
    {
        return $user->crops()->create([
            'name' => $data['name'],
            'crop_type' => $data['crop_type'],
            'plantation_date' => $data['plantation_date'] ?? now(),
        ]);
    }

    /**
     * Delete a crop from farm.
     */
    public function deleteFromFarm($user, $id)
    {
        $crop = $user->crops()->findOrFail($id);

        return $crop->delete();
    }
}
