<?php

namespace Modules\DoctorAppointmentManagement\Shell\Http\Controllers;

use App\Shared\Traits\ResponseJson;
use App\Http\Controllers\Controller;
use Modules\DoctorAppointmentManagement\Core\Services\DoctorManagementService;
use Modules\DoctorAppointmentManagement\Shell\Http\Resources\AppointmentResource;
use Modules\DoctorAppointmentManagement\Shell\Http\Requests\ApproveAppointmentRequest;
use Modules\DoctorAppointmentManagement\Shell\Http\Requests\UpcomingAppointmentRequest;

class DoctorAppointmentManagementController extends Controller
{
    use ResponseJson;
    public function __construct(
        private DoctorManagementService $doctorManagementService
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function showUpcomingAppointment(UpcomingAppointmentRequest $request)
    {
        try {
            $appointment = $this->doctorManagementService->showUpcomingAppointment($request->validated());
            // dd($appointment);
            return $this->successResponse(AppointmentResource::collection($appointment),  'Upcoming Appointment retrieved successfully');
        } catch (\Exception $e) {
            return response()->json(
                [
                'status' => 'error',
                'message' => $e->getMessage()
                ]
            );
        }
    }

    public function approveAppointment(ApproveAppointmentRequest $request)
    {
        try {
            $this->doctorManagementService->approveAppointment($request->validated());
            // dd($appointment);
            return $this->successResponse([],  'Doctor has approved the appointment successfully');

        } catch (\Exception $e) {
            return response()->json(
                [
                'status' => 'error',
                'message' => $e->getMessage()
                ]
            );
        }
    }

}
