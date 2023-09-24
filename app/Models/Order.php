<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $user_id
 * @property int $status_id
 * @property string $phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read User $user
 * @property-read OrderStatus $status
 * @property-read Product[]|Collection $products
 */
final class Order extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'status_id',
        'phone',
        'status',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'status_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'user',
        'status',
        'products',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status_id', 'id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'order_products',
            'order_id',
            'product_id',
        );
    }
}