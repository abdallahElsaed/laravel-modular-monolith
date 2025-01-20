<?php

namespace Modules\DoctorAvailability\Domain\Contracts;

use Modules\DoctorAvailability\Domain\Entities\DoctorEntity;

interface DoctorRepositoryInterface
{
    /**
     * @param string $doctor_id
     * @return DoctorEntity
     */
    public function getDoctorById(string $doctor_id): DoctorEntity;
    /**
     * @param string $doctor_id
     * @return bool
     */
    public function doctorIsExist(string $doctor_id): bool;
}
