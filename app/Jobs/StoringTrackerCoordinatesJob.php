<?php

namespace App\Jobs;

use App\Services\Admin\TrackerCoordinatesService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoringTrackerCoordinatesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $coordinates;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($coordinates)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new TrackerCoordinatesService)->store($this->coordinates);
    }
}
