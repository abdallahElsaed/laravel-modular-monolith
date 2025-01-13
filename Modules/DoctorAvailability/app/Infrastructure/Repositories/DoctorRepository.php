<?php

namespace Modules\DoctorAvailability\Infrastructure\Repositories;

use DateTimeImmutable;
use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Models\Slot;
use Modules\DoctorAvailability\Models\Doctor;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;
use Modules\DoctorAvailability\Domain\Entities\DoctorEntity;
use Modules\DoctorAvailability\Domain\Contracts\DoctorRepositoryInterface;

class DoctorRepository implements DoctorRepositoryInterface
{
    /**
     * @param DoctorEntity $slot
     */
    public function findDoctor(string $doctor_id): DoctorEntity
    {
        $doctor = Doctor::where('id', $doctor_id)->first();

        if (!$doctor) {
            throw new \InvalidArgumentException("Doctor not found");
        }

        return new DoctorEntity($doctor->id, $doctor->name);
    }
    /**
     * @return SlotEntity[]
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
    public function addSlot(SlotEntity $slot): void
    {

    }

}
