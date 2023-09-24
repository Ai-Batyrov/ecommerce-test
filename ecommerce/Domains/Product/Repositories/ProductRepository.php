<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Product\Repositories;

use App\Models\Product;
use App\Models\User;
use Ecommerce\Domains\Product\DTO\ManageDTO;
use Illuminate\Database\Eloquent\Collection;

final class ProductRepository
{
    public function index(): Collection
    {
        return Product::all();
    }

    public function create(User $user, ManageDTO $dto): Product
    {
        $product = new Product();
        $product->user_id = $user->id;
        $product->name = $dto->name;
        $product->description = $dto->description;
        $product->cost = $dto->cost;

        $product->save();

        return $product;
    }

    public function update(Product $product, ManageDTO $dto): Product
    {
        $product->name = $dto->name;
        $product->description = $dto->description;
        $product->cost = $dto->cost;
        $product->save();

        return $product;
    }
}