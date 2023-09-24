<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Product\Requests;

use App\Requests\Request;
use Ecommerce\Domains\Product\DTO\ManageDTO;

final class ManageRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'cost' => 'required|integer',
        ];
    }

    public function getDto(): ManageDTO
    {
        return new ManageDTO(
            $this->validated('name'),
            $this->validated('description'),
            (int) $this->validated('cost')
        );
    }
}