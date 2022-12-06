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
        return $this->transactionLogService->daily($request->all());
    }
}
