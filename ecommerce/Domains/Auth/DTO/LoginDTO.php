<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Auth\DTO;

final class LoginDTO
{
    public function __construct(
        public string $email,
        public string $password
    ) {}
}