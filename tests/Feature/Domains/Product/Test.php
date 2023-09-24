<?php

declare(strict_types=1);

namespace Domains\Product;

use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class Test extends TestCase
{
    public function testIndex(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Product $product */
        $product = Product::factory()->create([
            'user_id' => $user->id,
        ]);

        ProductPhoto::factory()->create([
            'product_id' => $product->id,
        ]);

        $this->actingAs($user, 'api');

        $response = $this->get(route('product-index'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'created_at',
                        'updated_at',
                        'photos' => [
                            '*' => [
                                'id',
                                'photo',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    public function testShow(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Product $product */
        $product = Product::factory()->create([
            'user_id' => $user->id,
        ]);

        ProductPhoto::factory()->create([
            'product_id' => $product->id,
        ]);

        $this->actingAs($user, 'api');

        $response = $this->get(route('product-show', [
            'product' => $product->id,
        ]));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'id',
                    'name',
                    'description',
                    'created_at',
                    'updated_at',
                    'photos' => [
                        '*' => [
                            'id',
                            'photo',
                        ],
                    ],
                ],
            ]);
    }
}