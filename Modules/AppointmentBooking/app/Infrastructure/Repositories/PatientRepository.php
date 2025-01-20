<?php

namespace Modules\AppointmentBooking\Infrastructure\Repositories;

use Modules\AppointmentBooking\Models\Patient;
use Modules\AppointmentBooking\Domain\Entities\PatientEntity;
use Modules\AppointmentBooking\Domain\Contracts\PatientRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\PatientIsExistRepositoryInterface;

class PatientRepository implements PatientRepositoryInterface
{
    /**
     * @param string $patient_id
     */
    public function patientIsExist(string $patient_id): bool
    {
        return Patient::where('id', $patient_id)->exists();
    }

    /**
     * @param string $patient_id
     * @return PatientEntity
     */
    public function getPatientById(string $patient_id): PatientEntity
    {
        $patient = Patient::where('id', $patient_id)->first();

        return new PatientEntity($patient->id, $patient->name);
    }
}
