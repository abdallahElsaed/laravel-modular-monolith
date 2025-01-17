<?php

namespace Modules\DoctorAvailability\Infrastructure\Repositories;

use DateTimeImmutable;
use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Models\Slot;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;
use Modules\DoctorAvailability\Domain\Contracts\AvailableSlotsRepositoryInterface;


class AvailableSlotsRepository implements AvailableSlotsRepositoryInterface
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
}
