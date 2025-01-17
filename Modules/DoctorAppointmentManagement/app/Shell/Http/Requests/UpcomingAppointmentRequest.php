<?php

namespace Modules\DoctorAppointmentManagement\Shell\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpcomingAppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'doctor_id' => 'required|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
