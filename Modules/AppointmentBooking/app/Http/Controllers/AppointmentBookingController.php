<?php

namespace Modules\AppointmentBooking\Http\Controllers;

use App\Shared\Traits\ResponseJson;
use App\Http\Controllers\Controller;
use Modules\AppointmentBooking\Http\Resources\SlotsResource;
use Modules\AppointmentBooking\Actions\ShowAvailableSlotsAction;
use Modules\AppointmentBooking\Http\Requests\AvailableSlotsRequest;

class AppointmentBookingController extends Controller
{
    use ResponseJson;

    public function __construct(
        private ShowAvailableSlotsAction $showAvailableSlotsAction
    ) {
    }
    /**
     * Display a listing of Available Slots.
     */
    public function showAvailableSlots(AvailableSlotsRequest $request)
    {
        // dd($request->validated());
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
    public function bookAppointment()
    {
        return  'bookAppointment';
    }
}
