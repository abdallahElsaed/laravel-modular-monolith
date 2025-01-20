<?php

namespace Modules\AppointmentBooking\Actions;

use Illuminate\Support\Str;
use Modules\AppointmentBooking\Events\AppointmentBookedEvent;
use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;
use Modules\DoctorAvailability\Domain\Contracts\SlotRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\DoctorRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\PatientRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\GetSlotRepositoryInterface;
use Modules\DoctorAvailability\Domain\Contracts\ReserveSlotRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\PatientIsExistRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\SaveAppointmentRepositoryInterface;

class BookAppointmentAction
{
    private $appointmentRepository;
    private $slotRepository;
    private $patientRepository;
    private $doctorRepository;

    public function __construct(
        SlotRepositoryInterface $slotRepository,
        SaveAppointmentRepositoryInterface $appointmentRepository,
        PatientRepositoryInterface $patientRepository,
        DoctorRepositoryInterface $doctorRepository,
    ) {
        $this->slotRepository = $slotRepository;
        $this->appointmentRepository = $appointmentRepository;
        $this->patientRepository = $patientRepository;
        $this->doctorRepository = $doctorRepository;
    }

    public function book($request)
    {
        // check if the doctor is exist
        $doctorIsExist = $this->doctorRepository->doctorIsExist($request['doctor_id']);
        if (!$doctorIsExist) {
            throw new \InvalidArgumentException("Doctor not found");
        }
        // check if the patient is exist
        $patientIsExist = $this->patientRepository->patientIsExist($request['patient_id']);
        if (!$patientIsExist) {
            throw new \InvalidArgumentException("Patient not found");
        }
        // save this appointment
        $request['id'] = Str::uuid()->toString();
        $request['reserved_at'] = $this->slotRepository->getSlot($request['slot_id'])->getTime();
        // dd($request);
        $appointment = $this->appointmentRepository->saveAppointment(AppointmentEntity::create($request));
        //  make this slot is reserved
        $this->slotRepository->reserveSlot($request['slot_id']);
        // send notification to the patient and doctor
        $notify_data = [
            'patient_name' => $this->patientRepository->getPatientById($appointment->getPatientId())->getName(),
            'doctor_name' => $this->doctorRepository->getDoctorById($appointment->getDoctorId())->getName(),
            'appointment_time' => $appointment->getReservedAt(),
        ];
        event(new AppointmentBookedEvent($notify_data));
    }
}

