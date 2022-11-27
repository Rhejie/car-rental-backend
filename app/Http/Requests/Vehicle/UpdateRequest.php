<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'model' => 'required|string',
            'tracker' => 'required',
            'color' => 'required',
            'vehicle_brand' => 'required',
            'fuel_capacity' => 'required',
            'fuel_consumption' => 'required',
            'odometer' => 'required',
            'plate_number' => 'required',
            'cr_no' => 'required',
            'engine_no' => 'required',
            'chassis_no' => 'required',
            'cr_expiration_date' => 'required|date',
            'capacity' => 'required'
        ];
    }
}
