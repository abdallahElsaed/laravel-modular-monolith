<?php

namespace Modules\AppointmentBooking\Actions;

use App\Shared\Traits\ResponseJson;
use Modules\AppointmentBooking\Http\Resources\SlotsResource;
use Modules\DoctorAvailability\Domain\Contracts\DoctorIsExistRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\AvailableSlotsRepositoryInterface;

class ShowAvailableSlotsAction
{
    use ResponseJson;
    private $availableSlotsRepository;
    private $doctorIsExistRepository;

    public function __construct(AvailableSlotsRepositoryInterface $availableSlotsRepository, DoctorIsExistRepositoryInterface $doctorIsExistRepository)
    {
        $this->availableSlotsRepository = $availableSlotsRepository;
        $this->doctorIsExistRepository = $doctorIsExistRepository;
    }

    public function show($request)
    {
            // 1. check if doctor is exist
            $this->doctorIsExistRepository->doctorIsExist($request['doctor_id']);
            // 2. get all available slots for the doctor from repo
            $slots = $this->availableSlotsRepository->getAvailableSlots($request['doctor_id']);
            // 3. return response with available slots
            return $slots;
    }
}
