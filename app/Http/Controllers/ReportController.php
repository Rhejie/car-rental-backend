<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\TransactionLog;
use App\Services\Admin\TransactionLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class ReportController extends Controller
{
    private $transactionLogService;

    public function __construct()
    {
        $this->transactionLogService = new TransactionLogService();
    }

    public function getAllMonths()
    {
        return $this->transactionLogService->getAllMonths();
    }

    public function daily(Request $request)
    {
        $date = $request->date ? $request->date : null;
        return $this->transactionLogService->dailyReport($date);
    }

    public function dailyReportDownload(Request $request)
    {
        $date = $request->date ? $request->date : null;

        if ($date) {

            $transactions = TransactionLog::with(['transactionable'])->whereDate('created_at', $date)->get();

            $fileName = 'Daily-report-' . $date . time() . '.pdf';
            $pdf = new PDF;

            $pdf = PDF::loadView('reports.daily', ["items" => $transactions, 'date' => $date]);

            $store = Storage::disk('local')->put('downloads/' . $fileName, $pdf->output());

            $path = 'downloads/' . $fileName;

            $url = Storage::disk('local')->url($path);

            return Storage::disk('local')->download($path);
        }
    }

    public function monthly(Request $request)
    {

        $year = $request->year ? $request->year : null;
        $month = $request->month ? $request->month : null;
        return $this->transactionLogService->monthlyReport($month, $year);
    }

    public function downloadMonthlyTransaction(Request $request)
    {
        $year = $request->year ? $request->year : null;
        $month = $request->month ? $request->month : null;
        $monthInNumber = $request->month_in_number ? $request->month_in_number : null;


        $transactions = TransactionLog::with(['transactionable'])->whereYear('created_at', 2022)->whereMonth('created_at', 12)->get();

        $fileName = 'monthly-report-' . 2022 . time() . '.pdf';
        $pdf = new PDF;

        $pdf = PDF::loadView('reports.monthly', ["items" => $transactions, 'month' => 'December', 'year' => 2022]);

        $store = Storage::disk('local')->put('downloads/' . $fileName, $pdf->output());

        $path = 'downloads/' . $fileName;

        $url = Storage::disk('local')->url($path);

        return Storage::disk('local')->download($path);
    }

    public function getTotalIncome()
    {
        return $this->transactionLogService->getTotalIncome();
    }

    public function getTotalExpenses(Request $request)
    {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search : null;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;
        $year = $request->year ? $request->year : null;
        $month = $request->month ? $request->month : null;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count,
            'year' => $year,
            'month' => $month
        ];

        return $this->transactionLogService->expensesList(json_decode(json_encode($params)));
    }

    public function getSumExpenses()
    {
        return $this->transactionLogService->getTotalExpenses();
    }

    public function totalDrivers()
    {
        return response()->json(Driver::count());
    }

    public function getDriversReport(Request $request)
    {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search : null;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;
        $year = $request->year ? $request->year : null;
        $month = $request->month ? $request->month : null;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count,
            'year' => $year,
            'month' => $month
        ];

        return $this->transactionLogService->getDriversReport(json_decode(json_encode($params)));
    }

    public function getPayments(Request $request)
    {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search : null;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;
        $year = $request->year ? $request->year : null;
        $month = $request->month ? $request->month : null;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count,
            'year' => $year,
            'month' => $month
        ];
        return $this->transactionLogService->paymentList(json_decode(json_encode($params)));
    }
}
