<?php

namespace App\Rules;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class BookingDateRule implements Rule
{
    private $vehicle_id;
    private $book_end;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($vehicle_id, $book_end)
    {
        $this->vehicle_id = $vehicle_id;
        $this->book_end = $book_end;
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

        $bookEnd = (Carbon::parse($this->book_end))->format('Y-m-d H:i:s');

        $valueDate = (Carbon::parse($value))->format('Y-m-d H:i:s');

        $checkIfBooked = Booking::where('booking_start', '<=' , $valueDate)->where('booking_end', '>=', $valueDate)->where('vehicle_id', $this->vehicle_id)->where('booking_status', 'accept')->count();

        $checkIfBooked2 = Booking::where('booking_start', '>' , $valueDate)->where('booking_end', '>=', $bookEnd)->where('vehicle_id', $this->vehicle_id)->where('booking_status', 'accept')->count();

        $checkIfBooked3 = Booking::where('booking_start', '<=', $valueDate)->where('booking_end', '>=', $valueDate)->where('booking_end', '<=', $bookEnd)->where('vehicle_id', $this->vehicle_id)->where('booking_status', 'accept')->count();

        $checkIfBooked4 = Booking::where('booking_start', '>' , $valueDate)->where('booking_end', '<', $bookEnd)->where('vehicle_id', $this->vehicle_id)->where('booking_status', 'accept')->count();

        if($checkIfBooked > 0) {
            return false;
        }

        if($checkIfBooked2 > 0) {
            return false;
        }

        if($checkIfBooked3 > 0) {
            return false;
        }

        if($checkIfBooked4 > 0) {
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
        return 'Date is already booked.';
    }
}
