<?php

declare(strict_types=1);

namespace Domains\Auth;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class Test extends TestCase
{
    public function testRegister(): void
    {
        $password = fake()->password;

        $response = $this->post(route('register'), [
            'email' => fake()->email,
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'password' => $password,
            'password_confirm' => $password,
        ]);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'access_token',
                    'expired_at'
                ],
            ]);
    }

    public function testLogin(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $user->password,
        ]);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'access_token',
                    'expired_at'
                ],
            ]);
    }
}