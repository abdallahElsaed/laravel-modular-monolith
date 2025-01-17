<?php

namespace Modules\DoctorAvailability\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;


interface AvailableSlotsRepositoryInterface
{
    /**
     * @param string $doctor_id
     * @return SlotEntity[]
     */
    public function getAvailableSlots(string $doctor_id): Collection;
}
