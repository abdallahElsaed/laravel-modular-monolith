<?php
namespace Modules\DoctorAvailability\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDoctorSlotsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'doctor_id' => 'required|string',
            'time'      => 'required',
            'is_reserved' => 'nullable|boolean',
            'cost' => 'required|numeric',
        ];
    }

    // public function messages()
    // {
    //     return [
    //     ];
    // }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // If 'is_reserved' is not set or is null, set it to 0
        $this->merge(
            [
            'is_reserved' => $this->input('is_reserved', 0),
            ]
        );
    }
}
