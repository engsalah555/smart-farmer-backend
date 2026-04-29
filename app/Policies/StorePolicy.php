<?php

namespace App\Policies;

use App\Models\User;
use App\Modules\Marketplace\Domain\Models\Store;
use Illuminate\Auth\Access\HandlesAuthorization;

class StorePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return in_array($user->user_type, ['admin', 'seller']);
    }

    public function view(User $user, Store $store): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $store->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && ! $user->store()->exists();
    }

    public function update(User $user, Store $store): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $store->user_id === $user->id;
    }

    public function delete(User $user, Store $store): bool
    {
        return $user->user_type === 'admin';
    }
}
