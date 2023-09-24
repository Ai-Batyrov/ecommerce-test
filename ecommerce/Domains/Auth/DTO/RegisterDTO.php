<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Auth\DTO;

final class RegisterDTO
{
    public function __construct(
        public string $email,
        public string $firstname,
        public string $lastname,
        public string $password
    ) {}
}