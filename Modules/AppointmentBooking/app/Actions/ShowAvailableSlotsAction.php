<?php

namespace Modules\AppointmentBooking\Actions;

use App\Shared\Traits\ResponseJson;
use Modules\DoctorAvailability\Domain\Contracts\SlotRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\DoctorRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\AvailableSlotsRepositoryInterface;

class ShowAvailableSlotsAction
{
    use ResponseJson;
    private $slotsRepository;
    private $doctorRepository;

    public function __construct(SlotRepositoryInterface $slotsRepository, DoctorRepositoryInterface $doctorRepository)
    {
        $this->slotsRepository = $slotsRepository;
        $this->doctorRepository = $doctorRepository;
    }

    public function show($request)
    {
        // 1. check if doctor is exist
        $doctorIsExist = $this->doctorRepository->doctorIsExist($request['doctor_id']);
        if (!$doctorIsExist) {
            throw new \InvalidArgumentException("Doctor not found");
        }
        // 2. get all available slots for the doctor from repo
        return $this->slotsRepository->getAvailableSlots($request['doctor_id']);
    }
}
