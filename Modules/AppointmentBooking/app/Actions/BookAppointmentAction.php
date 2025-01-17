<?php

namespace Modules\AppointmentBooking\Actions;

use Illuminate\Support\Str;
use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;
use Modules\DoctorAvailability\Domain\Contracts\GetSlotRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\ReserveSlotRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\DoctorIsExistRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\PatientIsExistRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\SaveAppointmentRepositoryInterface;

class BookAppointmentAction
{
    private $reserveSlotRepository;
    private $appointmentRepository;
    private $doctorIsExistRepository;
    private $patientIsExistRepository;
    private $getSlotRepositoryInterface;

    public function __construct(
        ReserveSlotRepositoryInterface $reserveSlotRepository,
        GetSlotRepositoryInterface $getSlotRepositoryInterface,
        SaveAppointmentRepositoryInterface $appointmentRepository,
        DoctorIsExistRepositoryInterface $doctorIsExistRepository,
        PatientIsExistRepositoryInterface $patientIsExistRepository,
        )
    {
        $this->reserveSlotRepository = $reserveSlotRepository;
        $this->appointmentRepository = $appointmentRepository;
        $this->doctorIsExistRepository = $doctorIsExistRepository;
        $this->patientIsExistRepository = $patientIsExistRepository;
        $this->getSlotRepositoryInterface = $getSlotRepositoryInterface;

    }

    public function book($request)
    {
        // dd($request);
            // check if the doctor is exist
            $this->doctorIsExistRepository->doctorIsExist($request['doctor_id']);
            // check if the patient is exist
            $this->patientIsExistRepository->patientIsExist($request['patient_id']);
            // save this appointment
            $request['id'] = Str::uuid()->toString();
            $request['reserved_at'] = $this->getSlotRepositoryInterface->getSlot($request['slot_id'])->getTime();
            // dd($request);

            $this->appointmentRepository->saveAppointment(AppointmentEntity::create($request));
            //  make this slot is reserved
            $this->reserveSlotRepository->reserveSlot($request['slot_id']);
            // send notification to the patient and doctor


    }
}

