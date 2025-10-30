<?php

namespace App\Providers;

use App\Events\CartItemsEvent;
use App\Events\OrderShipment;
use App\Listeners\AddCartItems;
use App\Listeners\CreateShipmentOder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CartItemsEvent::class => [
            AddCartItems::class,
        ],
        OrderShipment::class => [
            CreateShipmentOder::class
        ]
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
