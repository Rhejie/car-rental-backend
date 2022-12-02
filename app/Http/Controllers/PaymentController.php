<?php

namespace App\Http\Controllers;

use App\Services\Admin\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct() {
        $this->paymentService = new PaymentService();
    }

    public function history($id) {
        return $this->paymentService->paymentHistoryByBooking($id);
    }
}
