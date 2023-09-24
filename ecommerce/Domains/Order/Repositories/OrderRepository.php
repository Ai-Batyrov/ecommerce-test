<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Order\Repositories;

use App\Models\Order;
use App\Models\User;
use Ecommerce\Domains\Order\DTO\ManageDTO;
use Illuminate\Database\Eloquent\Collection;

final class OrderRepository
{
    public function index(User $user): Collection
    {
        return Order::query()
            ->where('user_id', $user->id)
            ->get();
    }

    public function create(User $user, ManageDTO $dto): Order
    {
        $order = new Order();
        $order->phone = $dto->phone;
        $order->status_id = $dto->status;
        $order->user_id = $user->id;
        $order->save();

        $order->products()->sync($dto->products);

        return $order;
    }

    public function update(Order $order, ManageDTO $dto): Order
    {
        $order->phone = $dto->phone;
        $order->status_id = $dto->status;
        $order->products()->sync($dto->products);
        $order->save();

        return $order;
    }
}