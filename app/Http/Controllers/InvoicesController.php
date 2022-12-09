<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\TransactionLog;
use App\Models\Vehicle;
use App\Models\VehicleMaintenance;
use App\Services\Admin\TransactionLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class InvoicesController extends Controller
{
    public function download($id) {
        $book = Booking::with(['user', 'payments', 'vehicle', 'driver', 'payments.paymentMode'])->find($id);

        return view('invoice.user-booking-invoice', ["item" => $book]);
    }

    public function transactionForm(Request $request) {

        $totalExpenes =  VehicleMaintenance::sum('price');

        $year = $request->year ? $request->year : null;
        $month = $request->month ? $request->month : null;
        $monthInNumber = $request->month_in_number ? $request->month_in_number : null;

        $roles = VehicleMaintenance::with(['vehicle.vehicleBrand']);

        if($year) {

            $roles = $roles->whereYear('created_at', $year);

        }

        if($year && $month) {

            $roles = $roles->whereMonth('created_at', $monthInNumber);
        }

        $roles = $roles->get();

        return view('reports.expenses', ['items' => $roles, 'month' => $month, 'year' => $year, 'total' => $totalExpenes]);
    }

    public function monthlyReport() {

        $date = '2022-12-8';

        $transactions = TransactionLog::with(['transactionable'])->whereYear('created_at', 2022)->whereMonth('created_at', 12)->get();

        $fileName = 'monthly-report-' . 2022 . time() . '.pdf';
        $pdf = new PDF;

        $pdf = PDF::loadView('reports.monthly', ["items" => $transactions, 'month' => 'December', 'year' => 2022]);

        $store = Storage::disk('local')->put('downloads/' . $fileName, $pdf->output());

        $path = 'downloads/' . $fileName;

        $url = Storage::disk('local')->url($path);

        return Storage::disk('local')->download($path);
    }
}
