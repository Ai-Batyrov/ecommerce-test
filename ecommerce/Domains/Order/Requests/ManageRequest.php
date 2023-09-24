<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Order\Requests;

use App\Requests\Request;
use Closure;
use Ecommerce\Domains\Order\DTO\ManageDTO;

final class ManageRequest extends Request
{
    public function rules(): array
    {
        return [
            'products' => 'required|array',
            'products.*' => 'required|integer|exists:products,id',
            'phone' => 'required|string',
            'status' => [
                'nullable',
                'integer',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (! $this->getCurrentUser()->is_admin) {
                        $fail(sprintf('The %s is can be used admin.', $attribute));
                    }
                }
            ],
        ];
    }

    public function getDto(): ManageDTO
    {
        return new ManageDTO(
            $this->validated('products'),
            $this->validated('phone'),
            (int) $this->validated('status', 1)
        );
    }
}