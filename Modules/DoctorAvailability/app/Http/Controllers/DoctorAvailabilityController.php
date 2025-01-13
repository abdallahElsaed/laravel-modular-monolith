<?php

namespace Modules\DoctorAvailability\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DoctorAvailability\App\Domain\Services\DoctorService;
use Modules\DoctorAvailability\Http\Requests\ShowDoctorSlotsRequest;

class DoctorAvailabilityController extends Controller
{
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
        // dd($request->validated());
        return $this->doctorService->showSlots($request->validated());
    }
}
