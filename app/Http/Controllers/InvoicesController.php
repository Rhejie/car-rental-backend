<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function download($id) {
        $book = Booking::with(['user', 'payments', 'vehicle', 'driver', 'payments.paymentMode'])->find($id);

        return view('invoice.user-booking-invoice', ["item" => $book]);
    }

    public function transactionForm() {
        $book = Vehicle::with(['maintenance', 'vehicleBrand'])->find(1);

        return view('vehicle.maintenance',  ["item" => $book]);
    }
}
