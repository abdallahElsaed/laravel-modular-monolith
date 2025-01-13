<?php

namespace Modules\DoctorAvailability\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;
use Modules\DoctorAvailability\Domain\Entities\DoctorEntity;

interface DoctorRepositoryInterface
{
    /**
     * @param SlotEntity $slot
     */
    public function findDoctor(string $doctor_id): DoctorEntity ;
    /**
     * @param SlotEntity $slot
     */
    public function doctorIsExist(string $doctor_id): void ;
    /**
     * @return SlotEntity[]
     */
    public function findSlotsByDoctorId(string $doctor_id): Collection;
    /**
     * @param SlotEntity $slot
     */
    public function addSlot(SlotEntity $slot): void;
}
