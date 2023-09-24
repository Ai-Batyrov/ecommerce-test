<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Auth\Requests;

use App\Requests\Request;
use Ecommerce\Domains\Auth\DTO\RegisterDTO;

final class RegisterRequest extends Request
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'password' => 'required|string|same:password_confirm',
            'password_confirm' => 'required|string|same:password',
        ];
    }

    public function getDto(): RegisterDTO
    {
        return new RegisterDTO(
            $this->validated('email'),
            $this->validated('firstname'),
            $this->validated('lastname'),
            $this->validated('password')
        );
    }
}