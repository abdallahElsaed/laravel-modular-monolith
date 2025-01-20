<?php

namespace Modules\AppointmentBooking\Http\Controllers;

use App\Shared\Traits\ResponseJson;
use App\Http\Controllers\Controller;
use Modules\AppointmentBooking\Http\Resources\SlotsResource;
use Modules\AppointmentBooking\Actions\BookAppointmentAction;
use Modules\AppointmentBooking\Actions\ShowAvailableSlotsAction;
use Modules\AppointmentBooking\Http\Requests\AvailableSlotsRequest;
use Modules\AppointmentBooking\Http\Requests\BookAppointmentRequest;

class AppointmentBookingController extends Controller
{
    use ResponseJson;

    public function __construct(
        private ShowAvailableSlotsAction $showAvailableSlotsAction,
        private BookAppointmentAction $bookAppointmentAction
    ) {
    }
    /**
     * Display a listing of Available Slots.
     */
    public function showAvailableSlots(AvailableSlotsRequest $request)
    {
        try {
            $slots = $this->showAvailableSlotsAction->show($request->validated());
            // 3. return response with available slots
            return $this->successResponse(SlotsResource::collection($slots),  'Doctor slots retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bookAppointment(BookAppointmentRequest $request)
    {
        try {
            $this->bookAppointmentAction->book($request->validated());
            // 3. return response with available slots
            return $this->successResponse([],  'The appointment has been booked successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
