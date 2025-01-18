<?php

namespace Modules\AppointmentBooking\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;


interface GetUpcomingAppointmentRepositoryInterface
{

    /**
     * @param string $doctor_id
     * @return Collection
     */
    public function getUpcomingAppointment(string $doctor_id): Collection;
}
