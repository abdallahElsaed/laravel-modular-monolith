<?php

namespace Modules\DoctorAvailability\Domain\Contracts;

use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;


interface ReserveSlotRepositoryInterface
{
    /**
     * @param string $slot_id
     * @return void
     */
    public function reserveSlot(string $slot_id): void;
}
