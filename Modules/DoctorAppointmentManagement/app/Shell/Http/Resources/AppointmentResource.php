<?php

namespace Modules\DoctorAppointmentManagement\Shell\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slotId' => $this->slotId,
            'patientId' => $this->patientId,
            'doctorId' => $this->doctorId,
            'reservedAt' => $this->reservedAt,
            'status' => $this->status
        ];
    }
}
