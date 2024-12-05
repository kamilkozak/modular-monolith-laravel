<?php

declare(strict_types=1);

namespace Module\Shipping\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Module\Shipping\Infrastructure\Database\Factories\ShippingAddressFactory;

class ShippingAddress extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ShippingAddressFactory::new();
    }
}
