<?php

declare(strict_types=1);

namespace Module\Shipping\Domain\Listeners;

use Illuminate\Support\Facades\Log;
use Module\Order\Contracts\Events\OrderFulfilled;

class NotifyWarehouse
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Module\Order\Contracts\Events\OrderFulfilled  $event
     * @return void
     */
    public function handle(OrderFulfilled $event)
    {
        Log::info('NotifyWarehouse: '.$event->orderId);

        // notify warehouse system
    }
}
