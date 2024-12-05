<?php

declare(strict_types=1);

namespace Module\Payment\Contracts;

interface PaymentService
{
    /**
     * Make payment for a given amount.
     *
     * @param  int  $orderId
     * @param  int  $amount
     * @return void
     *
     * @throws \Module\Payment\Contracts\Exceptions\PaymentException
     */
    public function charge(int $orderId, int $amount): void;
}
