<?php

namespace Modules\DoctorAvailability\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SlotsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'doctorId' => $this->getDoctorId(),
            'time' => $this->getTime()->format('Y-m-d H:i:s'),
            'isReserved' => $this->isReserved(),
            'cost' => $this->getCost(),
        ];
    }
}
