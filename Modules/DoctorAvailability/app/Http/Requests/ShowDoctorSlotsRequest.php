<?php
namespace Modules\DoctorAvailability\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowDoctorSlotsRequest extends FormRequest
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

    public function messages()
    {
        return [
            'doctor_id.required' => 'Doctor ID is required',
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
