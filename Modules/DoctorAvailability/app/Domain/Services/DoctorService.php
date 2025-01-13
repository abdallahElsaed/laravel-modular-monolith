<?php

namespace Modules\DoctorAvailability\App\Domain\Services;

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
}
