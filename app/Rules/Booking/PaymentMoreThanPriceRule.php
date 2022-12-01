<?php

namespace App\Rules\Booking;

use Illuminate\Contracts\Validation\Rule;

class PaymentMoreThanPriceRule implements Rule
{
    protected $total_price;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($total_price)
    {
        $this->total_price = $total_price;
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
        if($value > $this->total_price) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Payment must be equal or less than to the total price.';
    }
}
