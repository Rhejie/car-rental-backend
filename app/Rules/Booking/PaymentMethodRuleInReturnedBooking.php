<?php

namespace App\Rules\Booking;

use Illuminate\Contracts\Validation\Rule;

class PaymentMethodRuleInReturnedBooking implements Rule
{
    private $is_fully_paid;
    private $overcharges;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($is_fully_paid = false, $overcharges)
    {
        $this->is_fully_paid = $is_fully_paid;
        $this->overcharges = $overcharges;
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
        if($this->is_fully_paid && collect($this->overcharges)->count() > 0 && !$value) {
            return false;
        }

        if($this->is_fully_paid || $value ) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Payment Method field is required.';
    }
}
