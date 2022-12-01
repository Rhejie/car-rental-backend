<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Services\Admin\PaymentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\String\Exception\RuntimeException;

class SavePaymentTransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $booking;
    private $paymentRequest;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($booking, $paymentRequest)
    {
        $this->booking = $booking;
        $this->paymentRequest = $paymentRequest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            throw new RuntimeException('Failed to create payment');
        }

    }
}
