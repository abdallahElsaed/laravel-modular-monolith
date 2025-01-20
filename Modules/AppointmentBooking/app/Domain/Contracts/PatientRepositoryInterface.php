<?php

namespace Modules\AppointmentBooking\Domain\Contracts;

use Modules\AppointmentBooking\Models\Patient;
use Modules\AppointmentBooking\Domain\Entities\PatientEntity;

interface PatientRepositoryInterface
{

    /**
     * @param string $patient_id
     * @return PatientEntity
     */
    public function getPatientById(string $patient_id): PatientEntity;

    /**
     * @param string $patient_id
     * @return bool
     */
    public function patientIsExist(string $patient_id): bool ;
}
