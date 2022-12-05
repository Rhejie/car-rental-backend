<?php

namespace App\Rules\Booking;

use Illuminate\Contracts\Validation\Rule;

class DriverRule implements Rule
{
    private $add_driver;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($add_driver)
    {
        $this->add_driver = $add_driver;
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
        if($this->add_driver && !$value) {
            return false;
        }

        if(!$value && $this->add_driver) {
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
        return 'Driver is required.';
    }
}
