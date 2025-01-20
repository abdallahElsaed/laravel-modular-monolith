<?php

namespace Modules\AppointmentBooking\Domain\Contracts;

use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;



interface SaveAppointmentRepositoryInterface
{
    /**
     * @param AppointmentEntity $appointment
     * @return AppointmentEntity
     */
    public function saveAppointment(AppointmentEntity $appointment): AppointmentEntity;
}
