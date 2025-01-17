<?php

namespace Modules\AppointmentBooking\Infrastructure\Repositories;

use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;
use Modules\AppointmentBooking\Domain\Contracts\SaveAppointmentRepositoryInterface;
use Modules\AppointmentBooking\Models\Appointment;

class AppointmentRepository implements SaveAppointmentRepositoryInterface
{
    /**
     * @param  AppointmentEntity $appointment
     * @return void
     */
    public function saveAppointment(AppointmentEntity $appointment): void
    {
        
        Appointment::create(
            [
            'id' => $appointment->getId(),
            'slot_id' => $appointment->getSlotId(),
            'patient_id' => $appointment->getPatientId(),
            'doctor_id' => $appointment->getDoctorId(),
            'reserved_at' => $appointment->getReservedAt(),
            'status' => $appointment->getStatus()
            ]
        );
    }
}
