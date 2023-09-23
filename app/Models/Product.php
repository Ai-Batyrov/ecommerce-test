<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $cost
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read ProductPhoto[]|Collection $photos
 */
final class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'cost',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'id' => 'integer',
        'cost' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class, 'product_id', 'id');
    }
}