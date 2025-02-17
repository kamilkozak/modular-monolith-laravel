<?php

declare(strict_types=1);

namespace Module\Order\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Module\Order\Domain\Models\Enums\OrderStatus as OrderStatusEnum;

class OrderStatus extends Model
{
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'slug' => OrderStatusEnum::class,
    ];
}
