<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Factory<Product>
 */
final class ProductFactory extends Factory
{
    use HasFactory;

    /**
     * @var string
     */
    protected $model = Product::class;

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'name' => $this->faker->title,
            'description' => $this->faker->sentence,
            'cost' => $this->faker->randomNumber(),
        ];
    }
}