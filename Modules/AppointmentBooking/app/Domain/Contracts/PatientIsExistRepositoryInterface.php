<?php

namespace Modules\AppointmentBooking\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;


interface PatientIsExistRepositoryInterface
{

    /**
     * @param string $patient_id
     */
    public function patientIsExist(string $patient_id): void ;
}
