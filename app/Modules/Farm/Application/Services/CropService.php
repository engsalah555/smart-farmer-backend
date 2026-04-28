<?php

namespace App\Modules\Farm\Application\Services;

use App\Models\User;
use App\Modules\PlantGuide\Domain\Models\Crop;
use App\Modules\Farm\Domain\Repositories\CropRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class CropService
{
    protected $cropRepository;

    public function __construct(CropRepositoryInterface $cropRepository)
    {
        $this->cropRepository = $cropRepository;
    }

    public function getUserCrops(User $user): Collection
    {
        // Simple Caching for 10 minutes to reduce DB load
        return Cache::remember("user_{$user->id}_crops", 600, function () use ($user) {
            return $this->cropRepository->getByUser($user);
        });
    }

    public function addCrop(User $user, array $data): Crop
    {
        // Check for the 8-crop limit
        $currentCount = $this->cropRepository->getByUser($user)->count();
        if ($currentCount >= 8) {
            throw new \Exception("لقد وصلت للحد الأقصى المسموح به (8 محاصيل). يرجى حذف محصول قبل إضافة جديد.");
        }

        $crop = $this->cropRepository->createForUser($user, $data);
        Cache::forget("user_{$user->id}_crops"); // Clear cache on change
        return $crop;
    }

    public function removeCrop(User $user, $id): bool
    {
        $crop = $this->cropRepository->findByIdForUser($user, $id);
        if (!$crop) {
            throw new \Exception("Crop not found");
        }
        
        $deleted = $this->cropRepository->delete($crop);
        if ($deleted) {
            Cache::forget("user_{$user->id}_crops");
        }
        return $deleted;
    }
}
