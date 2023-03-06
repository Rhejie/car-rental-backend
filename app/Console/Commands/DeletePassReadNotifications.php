<?php

namespace App\Console\Commands;

use App\Jobs\DeletePassReadedNotifications;
use Illuminate\Console\Command;

class DeletePassReadNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:oldNotif';

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
        DeletePassReadedNotifications::dispatch();
        return Command::SUCCESS;
    }
}
