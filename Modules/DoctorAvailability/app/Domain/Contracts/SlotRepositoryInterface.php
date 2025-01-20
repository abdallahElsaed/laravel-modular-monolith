<?php

namespace Modules\DoctorAvailability\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;


interface SlotRepositoryInterface
{
    /**
     * @param string $slot_id
     * @return SlotEntity[]
     */
    public function findSlotsByDoctorId(string $slot_id): Collection;

        /**
     * @param SlotEntity $slot
     */
    public function addSlot(SlotEntity $slot): SlotEntity;
        /**
     * @param string $doctor_id
     * @return SlotEntity[]
     */
    public function getAvailableSlots(string $doctor_id): Collection;
        /**
     * @param string $slot_id
     * @return void
     */
    public function reserveSlot(string $slot_id): void;
        /**
     * @param string $slot_id
     * @return SlotEntity
     */
    public function getSlot(string $slot_id): SlotEntity;
}
