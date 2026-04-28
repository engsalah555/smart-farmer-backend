<?php

namespace App\Modules\Farm\Domain\Repositories;

use App\Models\User;
use App\Modules\PlantGuide\Domain\Models\Crop;
use Illuminate\Database\Eloquent\Collection;

interface CropRepositoryInterface
{
    public function getByUser(User $user): Collection;
    public function createForUser(User $user, array $data): \App\Modules\PlantGuide\Domain\Models\Crop;
    public function findByIdForUser(User $user, $id): ?\App\Modules\PlantGuide\Domain\Models\Crop;
    public function delete(\App\Modules\PlantGuide\Domain\Models\Crop $crop): bool;
}
