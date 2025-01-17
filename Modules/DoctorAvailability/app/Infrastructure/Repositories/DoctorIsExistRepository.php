<?php

namespace Modules\DoctorAvailability\Infrastructure\Repositories;

use Modules\DoctorAvailability\Models\Doctor;
use Modules\DoctorAvailability\Domain\Contracts\DoctorIsExistRepositoryInterface;


class DoctorIsExistRepository implements DoctorIsExistRepositoryInterface
{
    /**
     * @param string $doctor_id
     */
    public function doctorIsExist(string $doctor_id): void
    {
        $doctor = Doctor::where('id', $doctor_id)->exists();
        if (!$doctor) {
            throw new \InvalidArgumentException("Doctor not found");
        }
    }
}
