<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
final class OrderStatus extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'order_statuses';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}