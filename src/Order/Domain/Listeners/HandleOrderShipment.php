<?php

declare(strict_types=1);

namespace Module\Order\Domain\Listeners;

use Module\Shipping\Contracts\Events\ParcelShipped;

class HandleOrderShipment
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
     * @param  \Module\Shipping\Contracts\Events\ParcelShipped  $event
     * @return void
     */
    public function handle(ParcelShipped $event)
    {
        // do something
    }
}
