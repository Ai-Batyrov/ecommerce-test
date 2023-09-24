<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Product\DTO;

final class ManageDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public int $cost
    ) {}
}