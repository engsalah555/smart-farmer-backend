<?php

namespace App\Policies;

use App\Models\User;
use App\Modules\Marketplace\Domain\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return in_array($user->user_type, ['admin', 'seller']);
    }

    public function view(User $user, Order $order): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        if ($user->user_type === 'seller' && $order->store_id === $user->store?->id) {
            return true;
        }

        return $order->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Order $order): bool
    {
        if ($user->user_type === 'admin') {
            return true;
        }

        return $user->user_type === 'seller' && $order->store_id === $user->store?->id;
    }

    public function delete(User $user, Order $order): bool
    {
        return $user->user_type === 'admin';
    }
}
