<?php

namespace Modules\DoctorAppointmentManagement\Core\Services;

use Illuminate\Support\Collection;
use Modules\AppointmentBooking\Domain\Contracts\ApproveAppointmentRepositoryInterface;
use Modules\AppointmentBooking\Domain\Contracts\GetUpcomingAppointmentRepositoryInterface;

class DoctorManagementService
{
    public function __construct(
        private GetUpcomingAppointmentRepositoryInterface $getUpcomingAppointmentRepository,
        private ApproveAppointmentRepositoryInterface $approveAppointmentRepository
    )
    {
    }
    public function showUpcomingAppointment($request): Collection
    {
        return $this->getUpcomingAppointmentRepository->getUpcomingAppointment($request['doctor_id']);
    }
    public function approveAppointment($request): void
    {
        $this->approveAppointmentRepository->approveAppointment($request['appointment_id'], $request['status']);
    }
}
