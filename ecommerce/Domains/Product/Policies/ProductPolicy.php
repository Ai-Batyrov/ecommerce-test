<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Product\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

final class ProductPolicy
{
    public function isOwner(User $user, Product $product): Response
    {
        return $user->id === $product->user_id
            ? Response::allow()
            : Response::deny();
    }
}