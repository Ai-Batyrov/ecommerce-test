<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Order\Resources;

use App\Models\Order;
use Ecommerce\Domains\Product\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Order
 */
final class ShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'created_at' => $this->created_at?->format('d M Y, H:i:s'),
            'updated_at' => $this->updated_at?->format('d M Y, H:i:s'),
            'status' => StatusResource::make($this->status),
            'customer' => CustomerResource::make($this->user),
            'products' => ProductResource::collection($this->products),
        ];
    }
}