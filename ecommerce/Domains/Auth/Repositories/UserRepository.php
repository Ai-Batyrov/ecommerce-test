<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Auth\Repositories;

use App\Models\User;
use Ecommerce\Domains\Auth\DTO\AccessTokenDTO;
use Ecommerce\Domains\Auth\DTO\LoginDTO;
use Ecommerce\Domains\Auth\DTO\RegisterDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\PersonalAccessTokenResult;

final class UserRepository
{
    public function register(RegisterDTO $dto): AccessTokenDTO
    {
        $user = new User();
        $user->firstname = $dto->firstname;
        $user->lastname = $dto->lastname;
        $user->email = $dto->email;
        $user->password = Hash::make($dto->password);
        $user->save();

        Auth::login($user);

        $token = $this->createAccessToken($user);

        return new AccessTokenDTO(
            $token->accessToken,
            $token->token->expires_at,
        );
    }

    public function login(LoginDTO $dto): AccessTokenDTO
    {
        /** @var User $user */
        $user = User::query()->where('email', $dto->email)->firstOrFail();

        $token = $this->createAccessToken($user);

        Auth::login($user);

        return new AccessTokenDTO(
            $token->accessToken,
            $token->token->expires_at
        );
    }

    private function createAccessToken(User $user): PersonalAccessTokenResult
    {
        return $user->createToken(sprintf('%s:%s', $user->email, $user->firstname));
    }
}