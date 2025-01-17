<?php

namespace Modules\DoctorAvailability\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;
use Modules\DoctorAvailability\Domain\Entities\DoctorEntity;

interface DoctorRepositoryInterface
{
    /**
     * @param string $doctor_id
     */
    public function findDoctor(string $doctor_id): DoctorEntity ;
    /**
     * @param string $doctor_id
     */
    public function doctorIsExist(string $doctor_id): void ;
    /**
     * @param string $doctor_id
     * @return SlotEntity[]
     */
    public function findSlotsByDoctorId(string $doctor_id): Collection;
    /**
     * @param SlotEntity $slot
     */
    public function addSlot(SlotEntity $slot): void;
}
