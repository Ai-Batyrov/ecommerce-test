<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Auth\Response;

use Ecommerce\Domains\Auth\DTO\AccessTokenDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin AccessTokenDTO
 */
final class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'access_token' => $this->accessToken,
            'expired_at' => $this->expiredAt->toDateTimeString(),
        ];
    }
}