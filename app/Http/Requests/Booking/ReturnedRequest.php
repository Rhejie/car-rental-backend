<?php

namespace App\Http\Requests\Booking;

use App\Rules\Booking\PaymentMethodRuleInReturnedBooking;
use App\Rules\Booking\PaymentMoreThanPriceRule;
use App\Rules\Booking\PaymentPriceBookingRule;
use App\Rules\Booking\PriceRuleInReturnedBooking;
use App\Rules\Booking\ReferenceNumberBookingRule;
use Illuminate\Foundation\Http\FormRequest;

class ReturnedRequest extends FormRequest
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
            'is_fully_paid' => ['required', 'boolean'],
            'payment_method' => [new PaymentMethodRuleInReturnedBooking($this->is_fully_paid, $this->overcharges)],
            'has_penalty' => ['required', 'boolean'],
            'reference_number' => [new ReferenceNumberBookingRule($this->payment_method)],
            'total_price' => 'required',
            'total_paid' => 'required',
            'price' => [new PriceRuleInReturnedBooking($this->is_fully_paid),
                new PaymentPriceBookingRule($this->total_price, $this->total_paid, $this->is_fully_paid),
                new PaymentMoreThanPriceRule($this->total_price, $this->total_paid, $this->is_fully_paid)],
            'overcharges.*.overcharge_type_id' => ['required', 'exclude_if:has_penalty,false'],
            'overcharges.*.charge' => ['required', 'exclude_if:has_penalty,false'],
        ];
    }
}
