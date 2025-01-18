<?php

namespace Modules\AppointmentBooking\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;


interface ApproveAppointmentRepositoryInterface
{

    /**
     * @param string $appointment_id
     * @param string $status
     * @return void
     */
    public function approveAppointment(string $appointment_id, string $status): void;
}
