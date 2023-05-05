<?php

namespace App\Providers;
use App\Events\GJpengirimanKainSaved;
use App\Listeners\GJ_H_stock_polosListener;
use App\Listeners\GJ_H_bs_polosListener;
use App\Listeners\GJ_H_stock_printingListener;
use App\Listeners\GJ_H_bs_printingListener;
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
        
        GJpengirimanKainSaved::class => [
        GJ_H_stock_polosListener::class,
        GJ_H_bs_polosListener::class,
        GJ_H_stock_printingListener::class,
        GJ_H_bs_printingListener::class,
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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
