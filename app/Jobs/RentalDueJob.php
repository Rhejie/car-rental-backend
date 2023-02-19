<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Notifications\UserRentalOverdueNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RentalDueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $bookings = Booking::where('booking_end', '<', \Carbon\Carbon::now())->get();

        foreach ($bookings as $key => $book) {
            $model = Booking::with(['user'])->find($book->id);
            $user = $model->user;
            $user->notify(new UserRentalOverdueNotification($user, $model));
        }
    }
}
