<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\ProductPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends Factory<ProductPhoto>
 */
final class ProductPhotoFactory extends Factory
{
    use HasFactory;

    /**
     * @var string
     */
    protected $model = ProductPhoto::class;

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'photo' => $this->faker->url,
        ];
    }
}