<?php

namespace Modules\AppointmentBooking\Providers;

use Modules\AppointmentBooking\Events\AppointmentBookedEvent;
use Modules\AppointmentConfirmation\Listeners\NotifyPatientForBookingListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        AppointmentBookedEvent::class => [
            NotifyPatientForBookingListener::class
        ]
    ];

    /**
     * Indicates if events should be discovered.
     *
     * @var bool
     */
    protected static $shouldDiscoverEvents = true;

    /**
     * Configure the proper event listeners for email verification.
     */
    protected function configureEmailVerification(): void
    {
        //
    }
}
