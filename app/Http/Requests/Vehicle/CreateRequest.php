<?php

namespace App\Http\Requests\Vehicle;

use App\Rules\CreateVehicleRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'tracker' => ['required', new CreateVehicleRule],
            'color' => 'required',
            'vehicle_brand' => 'required',
            'fuel_type' => 'required'
        ];
    }
}
