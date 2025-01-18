<?php

namespace Modules\AppointmentBooking\Infrastructure\DTOs;

class AppointmentDTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $slotId,
        public readonly string $patientId,
        public readonly string $doctorId,
        public readonly string $reservedAt,
        public readonly string $status
    ) {
    }
}
