<?php

namespace App\Modules\Farm\Domain\Repositories;

use App\Models\User;
use App\Modules\PlantGuide\Domain\Models\Crop;
use Illuminate\Database\Eloquent\Collection;

interface CropRepositoryInterface
{
    public function getByUser(User $user): Collection;

    public function createForUser(User $user, array $data): Crop;

    public function findByIdForUser(User $user, $id): ?Crop;

    public function delete(Crop $crop): bool;
}
