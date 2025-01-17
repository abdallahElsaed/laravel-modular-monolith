<?php

namespace Modules\AppointmentBooking\Infrastructure\Repositories;

use Modules\AppointmentBooking\Domain\Contracts\PatientIsExistRepositoryInterface;
use Modules\AppointmentBooking\Models\Patient;

class PatientRepository implements PatientIsExistRepositoryInterface
{
    /**
     * @param string $patient_id
     */
    public function patientIsExist(string $patient_id): void
    {
        $patient = Patient::where('id', $patient_id)->exists();
        if (!$patient) {
            throw new \InvalidArgumentException("Patient not found");
        }
    }
}
