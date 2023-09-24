<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Order\DTO;

final class ManageDTO
{
    public function __construct(
        public array $products,
        public string $phone,
        public int $status
    ) {}
}