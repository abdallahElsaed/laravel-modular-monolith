<?php

namespace Modules\DoctorAvailability\App\Domain\Services;

use DateTimeImmutable;
use Illuminate\Support\Str;
use Modules\DoctorAvailability\Domain\Entities\SlotEntity;
use Modules\DoctorAvailability\Shared\Traits\ResponseJson;
use Modules\DoctorAvailability\Http\Resources\SlotsResource;
use Modules\DoctorAvailability\Domain\Contracts\DoctorRepositoryInterface;


class DoctorService
{
    use ResponseJson;
    private DoctorRepositoryInterface $doctorRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function showSlots($request)
    {
        $doctor_id = $request['doctor_id'];
        try {
            $doctor = $this->doctorRepository->findDoctor($doctor_id);
            $slots = $this->doctorRepository->findSlotsByDoctorId($doctor->getId());
            return $this->successResponse(SlotsResource::collection($slots), 'Doctor slots retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Error', $e->getMessage());
        }
    }
    public function addSlot($request)
    {
        try {
            $this->doctorRepository->doctorIsExist($request['doctor_id']);
            $slot = new SlotEntity(
                Str::uuid()->toString(),
                $request['doctor_id'],
                new DateTimeImmutable($request['time']),
                $request['is_reserved'] ?? 0,
                $request['cost']
            );
            $this->doctorRepository->addSlot($slot);
            return $this->successResponse([], 'Slot added successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Error', $e->getMessage());
        }
    }
}
