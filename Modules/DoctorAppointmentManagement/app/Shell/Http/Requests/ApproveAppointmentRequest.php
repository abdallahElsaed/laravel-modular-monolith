<?php

namespace Modules\DoctorAppointmentManagement\Shell\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApproveAppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'appointment_id' => 'required|string',
            'status' => 'required|string',
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
