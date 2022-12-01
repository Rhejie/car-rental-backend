<?php

namespace App\Http\Requests\Booking;

use App\Rules\Booking\PaymentMoreThanPriceRule;
use App\Rules\Booking\PaymentPriceBookingRule;
use App\Rules\Booking\ReferenceNumberBookingRule;
use Illuminate\Foundation\Http\FormRequest;

class DeployRequest extends FormRequest
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
            'type' => 'required',
            'payment_method' => ['required'],
            'reference_number' => [new ReferenceNumberBookingRule($this->payment_method)],
            'total_price' => 'required',
            'price' => ['required', new PaymentPriceBookingRule($this->total_price), new PaymentMoreThanPriceRule($this->total_price)],
        ];
    }
}
