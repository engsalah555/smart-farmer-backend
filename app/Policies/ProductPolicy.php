<?php

namespace App\Policies;

use App\Models\User;
use App\Modules\Marketplace\Domain\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return in_array($user->user_type, ['admin', 'seller']);
    }

    public function view(User $user, Product $product): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $product->store_id === $user->store?->id;
    }

    public function create(User $user): bool
    {
        return in_array($user->user_type, ['admin', 'seller']);
    }

    public function update(User $user, Product $product): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $product->store_id === $user->store?->id;
    }

    public function delete(User $user, Product $product): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $product->store_id === $user->store?->id;
    }
}
