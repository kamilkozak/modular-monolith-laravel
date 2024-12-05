<?php

declare(strict_types=1);

namespace Module\Inventory\Contracts\Exceptions;

use Exception;

class OutOfStockException extends Exception
{
    public function __construct(public readonly int $productId)
    {
    }
}
