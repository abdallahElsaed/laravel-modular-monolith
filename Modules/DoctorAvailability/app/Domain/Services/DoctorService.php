<?php

namespace Modules\DoctorAvailability\App\Domain\Services;

use DateTimeImmutable;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;
use Modules\DoctorAvailability\Shared\Traits\ResponseJson;
use Modules\DoctorAvailability\Http\Resources\SlotsResource;
use Modules\DoctorAvailability\Domain\Contracts\SlotRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\DoctorRepositoryInterface;


class DoctorService
{
    use ResponseJson;
    private DoctorRepositoryInterface $doctorRepository;
    private SlotRepositoryInterface $slotRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository, SlotRepositoryInterface $slotRepository)
    {
        $this->doctorRepository = $doctorRepository;
        $this->slotRepository = $slotRepository;
    }

    public function showSlots($request): array|Collection
    {
        $doctor = $this->doctorRepository->getDoctorById($request['doctor_id']);
        return $this->slotRepository->findSlotsByDoctorId($doctor->getId());
    }
    public function addSlot($request)
    {
        $doctorIsExist = $this->doctorRepository->doctorIsExist($request['doctor_id']);
        if (!$doctorIsExist) {
            throw new \InvalidArgumentException("Doctor not found");
        }
        $slot = new SlotEntity(
            Str::uuid()->toString(),
            $request['doctor_id'],
            new DateTimeImmutable($request['time']),
            $request['is_reserved'] ?? 0,
            $request['cost']
        );
        // dd($slot);
        return $this->slotRepository->addSlot($slot);
    }
}
