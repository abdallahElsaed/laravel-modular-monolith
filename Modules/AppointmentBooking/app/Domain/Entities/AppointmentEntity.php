<?php

namespace Modules\AppointmentBooking\Domain\Entities;
use DateTimeImmutable;
class AppointmentEntity
{
    private string $id;
    private string $slotId;
    private string $patientId;
    private string $doctorId;
    private DateTimeImmutable $reservedAt;
    private string $status;

    public function __construct(
        string $id,
        string $slotId,
        string $patientId,
        string $doctorId,
        DateTimeImmutable $reservedAt,
        string $status = 'booked'
    ) {
        $this->id = $id;
        $this->slotId = $slotId;
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->reservedAt = $reservedAt;
        $this->status = $status;
    }

    public static function create(array $data): self
    {
        return new self(
            $data['id'],
            $data['slot_id'],
            $data['patient_id'],
            $data['doctor_id'],
            $data['reserved_at'],
        );
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSlotId()
    {
        return $this->slotId;
    }

    public function getPatientId()
    {
        return $this->patientId;
    }

    public function getDoctorId()
    {
        return $this->doctorId;
    }

    public function getReservedAt()
    {
        return $this->reservedAt;
    }

    public function getStatus()
    {
        return $this->status;
    }

    private function validate(): void
    {
        if (empty($this->slotId)) {
            throw new \InvalidArgumentException("Slot id cannot be empty.");
        }
        if (empty($this->patientId)) {
            throw new \InvalidArgumentException("Patient id cannot be empty.");
        }
        if (empty($this->doctorId)) {
            throw new \InvalidArgumentException("Doctor id cannot be empty.");
        }
    }
}
