<?php

namespace App\Http\Requests\Booking;

use App\Rules\Booking\DriverRule;
use App\Rules\Booking\PaymentDeployeMoreThanPriceRule;
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
            'add_driver' => 'required|boolean',
            'driver' => [new DriverRule($this->add_driver)],
            'price' => ['required', new PaymentPriceBookingRule($this->total_price), new PaymentDeployeMoreThanPriceRule($this->total_price)],
            'primary_operator_name' => ['exclude_unless:add_driver,false', 'required',],
            'primary_operator_license_no' => ['exclude_unless:add_driver,false', 'required',],
            'secondary_operator_license_no' => ['exclude_unless:has_secondary,true', 'required',],
            'price' => ['required']
        ];
    }
}
