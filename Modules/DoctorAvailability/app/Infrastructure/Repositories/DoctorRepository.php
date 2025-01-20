<?php

namespace Modules\DoctorAvailability\Infrastructure\Repositories;

use Modules\DoctorAvailability\Models\Doctor;
use Modules\DoctorAvailability\Domain\Entities\DoctorEntity;
use Modules\DoctorAvailability\Domain\Contracts\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface
{
    /**
     * @param string $doctor_id
     */
    public function getDoctorById(string $doctor_id): DoctorEntity
    {
        $doctor = Doctor::where('id', $doctor_id)->first();

        if (!$doctor) {
            throw new \InvalidArgumentException("Doctor not found");
        }

        return new DoctorEntity($doctor->id, $doctor->name);
    }
    /**
     * @param string $doctor_id
     * @return bool
     */
    public function doctorIsExist(string $doctor_id): bool
    {
        return Doctor::where('id', $doctor_id)->exists();
    }
}
