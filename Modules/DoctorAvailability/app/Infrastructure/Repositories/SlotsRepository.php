<?php

namespace Modules\DoctorAvailability\Infrastructure\Repositories;

use DateTimeImmutable;
use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Models\Slot;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;
use Modules\DoctorAvailability\Domain\Contracts\GetSlotRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\ReserveSlotRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\AvailableSlotsRepositoryInterface;

class SlotsRepository implements AvailableSlotsRepositoryInterface, ReserveSlotRepositoryInterface, GetSlotRepositoryInterface
{
    public function getAvailableSlots(string $doctor_id): Collection
    {
        $slots = Slot::where('doctor_id', $doctor_id)
            ->where('is_reserved', false)
            ->where('time', '>', now())
            ->get();

        return $slots->map(
            function ($slot) {
                return new SlotEntity(
                    $slot->id,
                    $slot->doctor_id,
                    new DateTimeImmutable($slot->time),
                    $slot->is_reserved,
                    $slot->cost
                );
            }
        );
    }

    public function reserveSlot(string $slot_id): void
    {
        Slot::find($slot_id)->update(
            [
                'is_reserved' => true
            ]
        );
    }

    public function getSlot(string $slot_id): SlotEntity
    {
        $slot = Slot::find($slot_id);
        return new SlotEntity(
            $slot->id,
            $slot->doctor_id,
            new DateTimeImmutable($slot->time),
            $slot->is_reserved,
            $slot->cost
        );
    }
}
