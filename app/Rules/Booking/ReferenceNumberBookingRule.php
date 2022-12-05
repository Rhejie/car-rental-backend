<?php

namespace App\Rules\Booking;

use Illuminate\Contracts\Validation\Rule;

class ReferenceNumberBookingRule implements Rule
{
    private $paymentMethod;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value) {
            return true;
        }

        if(!$this->paymentMethod) {
            return true;
        }

        if(strtolower($this->paymentMethod['name']) == 'cash') {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        return 'Reference number is required.';
    }
}
