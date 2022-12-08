<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TransactionLog;
use App\Models\Vehicle;
use App\Services\Admin\TransactionLogService;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function download($id) {
        $book = Booking::with(['user', 'payments', 'vehicle', 'driver', 'payments.paymentMode'])->find($id);

        return view('invoice.user-booking-invoice', ["item" => $book]);
    }

    public function transactionForm() {

        $date = '2022-12-8';

        $transactions = TransactionLog::with(['transactionable'])->whereYear('created_at', 2022)->whereMonth('created_at', 12)->get();

        return view('reports.monthly',  ["items" => $transactions, 'month' => 'December', 'year' => 2022]);
    }
}
