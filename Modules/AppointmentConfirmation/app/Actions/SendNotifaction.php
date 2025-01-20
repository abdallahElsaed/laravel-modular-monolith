<?php

namespace Modules\AppointmentConfirmation\App\Actions;

use Modules\AppointmentConfirmation\App\Notifications\AppointmentConfirmationNotification;
use Illuminate\Support\Facades\Notification;

class SendNotification
{
    public function execute($appointment)
    {
        $details = [
            'patient_name' => $appointment->patient_name,
            'appointment_time' => $appointment->appointment_time,
            'doctor_name' => $appointment->doctor_name,
        ];

        Notification::route('mail', $appointment->patient_email)
            ->notify(new AppointmentConfirmationNotification($details));
    }
}
