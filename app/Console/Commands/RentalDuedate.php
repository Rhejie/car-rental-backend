<?php

namespace App\Console\Commands;

use App\Jobs\RentalDueJob;
use App\Models\Booking;
use App\Notifications\UserRentalOverdueNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RentalDuedate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rental:due';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
    * @return int
     */
    public function handle()
    {

        info('rental due running at '. now());
        RentalDueJob::dispatch();
        return 0;
        // return Command::SUCCESS;
    }
}
