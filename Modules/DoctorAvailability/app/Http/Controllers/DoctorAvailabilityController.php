<?php

namespace Modules\DoctorAvailability\Http\Controllers;

use Illuminate\Http\Request;
use App\Shared\Traits\ResponseJson;
use App\Http\Controllers\Controller;
use Modules\DoctorAvailability\Http\Resources\SlotsResource;
use Modules\DoctorAvailability\App\Domain\Services\DoctorService;
use Modules\DoctorAvailability\Http\Requests\AddDoctorSlotsRequest;
use Modules\DoctorAvailability\Http\Requests\ShowDoctorSlotsRequest;

class DoctorAvailabilityController extends Controller
{
    use ResponseJson;

    /**
     * @var DoctorService
     */
    private DoctorService $doctorService;

    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }
    /**
     * Display a listing of Doctor's slot.
     */
    public function showSlots(ShowDoctorSlotsRequest $request)
    {
        try {
            $slots = $this->doctorService->showSlots($request->validated());
            return $this->successResponse(SlotsResource::collection($slots), 'Doctor slots retrieved successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Error', $e->getMessage());
        }
    }
    public function addSlot(AddDoctorSlotsRequest $request)
    {
        try {
            $slot = $this->doctorService->addSlot($request->validated());
            return $this->successResponse(new SlotsResource($slot), 'Slot added successfully');
        } catch (\Exception $e) {
            return $this->errorResponse('Error', $e->getMessage());
        }
    }
}
