<?php

declare(strict_types=1);

namespace Module\Shipping\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Module\Order\Contracts\Events\OrderFulfilled;
use Module\Shipping\Domain\Listeners\NotifyWarehouse;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        OrderFulfilled::class => [
            NotifyWarehouse::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
