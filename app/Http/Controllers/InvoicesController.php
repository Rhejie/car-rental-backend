<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function download($id) {
        $book = Booking::with(['user', 'payments', 'vehicle', 'driver', 'payments.paymentMode'])->find($id);

        return view('invoice.user-booking-invoice', ["item" => $book]);
    }
}