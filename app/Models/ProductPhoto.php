<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $product_id
 * @property string $photo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Product $product
 */
final class ProductPhoto extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_photo';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'photo',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}