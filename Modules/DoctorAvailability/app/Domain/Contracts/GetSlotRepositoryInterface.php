<?php

namespace Modules\DoctorAvailability\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;


interface GetSlotRepositoryInterface
{
    /**
     * @param string $slot_id
     * @return SlotEntity
     */
    public function getSlot(string $slot_id): SlotEntity;
}
