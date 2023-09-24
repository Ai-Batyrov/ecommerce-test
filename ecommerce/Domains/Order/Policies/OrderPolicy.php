<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Order\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

final class OrderPolicy
{
    public function isOwner(User $user, Order $order): Response
    {
        return $user->id === $order->user_id
            ? Response::allow()
            : Response::deny('You do not own this order.');
    }
}