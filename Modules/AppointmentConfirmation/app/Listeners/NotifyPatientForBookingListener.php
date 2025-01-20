<?php

namespace Modules\AppointmentConfirmation\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Modules\AppointmentBooking\Events\AppointmentBookedEvent;

class NotifyPatientForBookingListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AppointmentBookedEvent $event): void
    {
        Log::info(
            'Patient has been notified for booking', [
            'patient_name' => $event->appointmentData['patient_name'],
            'appointment_time' => $event->appointmentData['appointment_time'],
            'doctor_name' => $event->appointmentData['doctor_name'],
            ]
        );
    }
}
