<?php

namespace Modules\AppointmentBooking\Domain\Contracts;

use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;



interface SaveAppointmentRepositoryInterface
{
    /**
     * @param AppointmentEntity $appointment
     * @return void
     */
    public function saveAppointment(AppointmentEntity $appointment): void;
}
