<?php

namespace App\Http\Requests\Booking;

use App\Rules\BookingDateRule;
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
            'add_driver' => 'required|boolean',
            'booking_start' => ['required', 'date', 'after:today', new BookingDateRule($this->vehicle_id, $this->booking_end)],
            'booking_end' => 'required|date|after:booking_start',
            'vehicle_id' => 'required',
            'destination' => 'required|string',
            'booking_purpose' => 'required|string',
            'primary_operator_name' => 'exclude_unless:add_driver,true|required',
            'primary_operator_license_no' => 'exclude_unless:add_driver,true|required',
        ];
    }
}
