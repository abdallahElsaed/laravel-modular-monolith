<?php

namespace Modules\DoctorAvailability\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;


interface DoctorIsExistRepositoryInterface
{

    /**
     * @param string $doctor_id
     */
    public function doctorIsExist(string $doctor_id): void ;
}
