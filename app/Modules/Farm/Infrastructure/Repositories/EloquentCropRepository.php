<?php

namespace App\Modules\Farm\Infrastructure\Repositories;

use App\Models\User;
use App\Modules\Farm\Domain\Repositories\CropRepositoryInterface;
use App\Modules\PlantGuide\Domain\Models\Crop;
use Illuminate\Database\Eloquent\Collection;

class EloquentCropRepository implements CropRepositoryInterface
{
    public function getByUser(User $user): Collection
    {
        return $user->crops()->with(['plant.careGuide'])->latest()->get();
    }

    public function createForUser(User $user, array $data): Crop
    {
        return $user->crops()->create([
            'plant_id' => $data['plant_id'] ?? null,
            'name' => $data['name'],
            'crop_type' => $data['crop_type'],
            'plantation_date' => $data['plantation_date'] ?? now(),
        ]);
    }

    public function findByIdForUser(User $user, $id): ?Crop
    {
        return $user->crops()->find($id);
    }

    public function delete(Crop $crop): bool
    {
        return $crop->delete();
    }
}
