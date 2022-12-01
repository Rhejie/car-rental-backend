<?php

namespace App\Jobs;

use App\Services\Admin\PaymentService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $paymentBooking;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($paymentBooking)
    {
        $this->paymentBooking = $paymentBooking;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $paymentService = new PaymentService();
        $paymentService->store($this->paymentBooking->payment, $this->paymentBooking->booking['id']);
    }
}
