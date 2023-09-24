<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Auth\Requests;

use App\Requests\Request;
use Ecommerce\Domains\Auth\DTO\LoginDTO;

final class LoginRequest extends Request
{
    public function rules(): array
    {
        return [
            'email' => 'required|string|exists:users,email',
            'password' => 'required|string',
        ];
    }

    public function getDto(): LoginDTO
    {
        return new LoginDTO(
            $this->validated('email'),
            $this->validated('password')
        );
    }
}