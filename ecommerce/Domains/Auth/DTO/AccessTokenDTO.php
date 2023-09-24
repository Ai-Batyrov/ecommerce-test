<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Auth\DTO;

use Illuminate\Support\Carbon;

final class AccessTokenDTO
{
    public function __construct(
        public string $accessToken,
        public Carbon $expiredAt,
    ) {}
}