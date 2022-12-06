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

    public function daily(Request $request) {
        $date = $request->date ? $request->date : null;
        return $this->transactionLogService->dailyReport($date);
    }
}
