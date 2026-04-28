<?php

namespace App\Modules\Farm\Infrastructure\Repositories;

use App\Models\User;
use App\Modules\PlantGuide\Domain\Models\Crop;
use App\Modules\Farm\Domain\Repositories\CropRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentCropRepository implements CropRepositoryInterface
{
    public function getByUser(User $user): Collection
    {
        return $user->crops()->latest()->get();
    }

    public function createForUser(User $user, array $data): \App\Modules\PlantGuide\Domain\Models\Crop
    {
        return $user->crops()->create([
            'name' => $data['name'],
            'crop_type' => $data['crop_type'],
            'plantation_date' => $data['plantation_date'] ?? now(),
        ]);
    }

    public function findByIdForUser(User $user, $id): ?\App\Modules\PlantGuide\Domain\Models\Crop
    {
        return $user->crops()->find($id);
    }

    public function delete(\App\Modules\PlantGuide\Domain\Models\Crop $crop): bool
    {
        return $crop->delete();
    }
}
