<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'booking_start' => 'required|date|after:today',
            'booking_end' => 'required|date|after:booking_start',
            'vehicle_id' => 'required',
            'vehicle_place_id' => 'required',
        ];
    }
}
