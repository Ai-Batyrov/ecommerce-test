<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderStatus>
 */
final class OrderStatusFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = OrderStatus::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
        ];
    }
}