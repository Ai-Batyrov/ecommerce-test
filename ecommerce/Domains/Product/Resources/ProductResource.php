<?php

declare(strict_types=1);

namespace Ecommerce\Domains\Product\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
 */
final class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d M Y, H:i:s'),
            'updated_at' => $this->updated_at->format('d M Y, H:i:s'),
            'photos' => PhotoResource::collection($this->photos),
        ];
    }
}