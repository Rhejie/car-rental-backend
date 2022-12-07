<?php

namespace App\Http\Controllers;

use App\Services\Admin\TransactionLogService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $transactionLogService;

    public function __construct() {
        $this->transactionLogService = new TransactionLogService();
    }

    public function getAllMonths () {
        return $this->transactionLogService->getAllMonths();
    }

    public function daily(Request $request) {
        $date = $request->date ? $request->date : null;
        return $this->transactionLogService->dailyReport($date);
    }

    public function monthly(Request $request) {

        $year = $request->year ? $request->year : null;
        $month = $request->month ? $request->month : null;
        return $this->transactionLogService->monthlyReport($month, $year);
    }

    public function getTotalIncome() {
        return $this->transactionLogService->getTotalIncome();
    }

    public function getPayments(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];
        return $this->transactionLogService->paymentList(json_decode(json_encode($params)));
    }
}
