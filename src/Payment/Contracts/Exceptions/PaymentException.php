<?php

declare(strict_types=1);

namespace Module\Payment\Contracts\Exceptions;

use Exception;

class PaymentException extends Exception
{
    public function __construct(
        public readonly int $orderId,
        public readonly int $amount
    ) {
    }
}
