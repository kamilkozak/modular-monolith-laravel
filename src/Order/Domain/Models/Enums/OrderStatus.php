<?php

declare(strict_types=1);

namespace Module\Order\Domain\Models\Enums;

enum OrderStatus: string
{
    case Fulfilled = 'fulfilled';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
}
