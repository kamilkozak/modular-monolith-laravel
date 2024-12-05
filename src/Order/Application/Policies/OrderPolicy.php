<?php

namespace Module\Order\Application\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Module\Order\Domain\Models\Order;

class OrderPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }
}
