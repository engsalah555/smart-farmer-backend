<?php

namespace App\Policies;

use App\Models\StoreCatalog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoreCatalogPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return in_array($user->user_type, ['admin', 'seller']);
    }

    public function view(User $user, StoreCatalog $storeCatalog): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $storeCatalog->store_id === $user->store?->id;
    }

    public function create(User $user): bool
    {
        return in_array($user->user_type, ['admin', 'seller']);
    }

    public function update(User $user, StoreCatalog $storeCatalog): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $storeCatalog->store_id === $user->store?->id;
    }

    public function delete(User $user, StoreCatalog $storeCatalog): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $storeCatalog->store_id === $user->store?->id;
    }
}
