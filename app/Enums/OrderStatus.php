<?php

declare(strict_types=1);

namespace App\Enums;

enum OrderStatus: string
{
    case CREATED = 'Created';
    case DELIVERED = 'Delivered';
    case CANCELED = 'Canceled';
}