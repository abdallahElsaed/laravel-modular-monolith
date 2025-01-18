<?php

namespace Modules\AppointmentBooking\Infrastructure\Repositories;

use Illuminate\Support\Collection;
use Modules\AppointmentBooking\Models\Appointment;
use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;
use Modules\AppointmentBooking\Infrastructure\DTOs\AppointmentDTO;
use Modules\AppointmentBooking\Domain\Contracts\SaveAppointmentRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\ApproveAppointmentRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\GetUpcomingAppointmentRepositoryInterface;

class AppointmentRepository implements SaveAppointmentRepositoryInterface, GetUpcomingAppointmentRepositoryInterface, ApproveAppointmentRepositoryInterface
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

    /**
     * @param  string $doctor_id
     * @return AppointmentDTO[]|Collection
     */
    public function getUpcomingAppointment(string $doctor_id): Collection
    {
        $appointment = Appointment::where('doctor_id', $doctor_id)
            // ->where('status', 'booked')
            ->where('reserved_at', '>=', now())
            ->get();

        return $appointment->map(
            function ($appointment): AppointmentDTO {
                return new AppointmentDTO(
                    $appointment->id,
                    $appointment->slot_id,
                    $appointment->patient_id,
                    $appointment->doctor_id,
                    $appointment->reserved_at,
                    $appointment->status
                );
            }
        );
    }

       /**
        * @param  string $appointment_id
        * @return void
        */
    public function approveAppointment(string $appointment_id, string $status): void
    {
        Appointment::where('id', $appointment_id)->update(
            [
            'status' => $status
            ]
        );
    }
}
