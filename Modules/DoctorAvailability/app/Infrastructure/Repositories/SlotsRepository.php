<?php

namespace Modules\DoctorAvailability\Infrastructure\Repositories;

use DateTimeImmutable;
use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Models\Slot;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;
use Modules\DoctorAvailability\Domain\Contracts\SlotRepositoryInterface;

class SlotsRepository implements SlotRepositoryInterface
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
    /**
     * @param string $doctor_id
     * @return SlotEntity[] | Collection
     */
    public function findSlotsByDoctorId(string $doctor_id): Collection
    {
        $slots = Slot::where('doctor_id', $doctor_id)->get();

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
        /**
     * @param SlotEntity $slot
     */
    public function addSlot(SlotEntity $slot):  SlotEntity
    {
        $slot = Slot::create(
            [
            'id' => $slot->getId(),
            'doctor_id' => $slot->getDoctorId(),
            'time' => $slot->getTime(),
            'is_reserved' => $slot->isReserved(),
            'cost' => $slot->getCost()
            ]
        );

        // dd($slot);

        return SlotEntity::create(
            [
            'id' => $slot->id,
            'doctor_id' => $slot->doctor_id,
            'time' => $slot->time,
            'is_reserved' => $slot->is_reserved,
            'cost' => $slot->cost
            ]
        );
    }
}
