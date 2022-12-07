<?php

namespace App\Notifications;

use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    protected $user;
    protected $booking;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Booking $booking)
    {
        $this->user = $user;
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'message' => 'Your destination to '.$this->booking->destination.' on '. (Carbon::parse($this->booking->booking_start))->format('M d, Y').' is successfully booked!',
            'title' => 'Booking',
            'link' => '/user/bookings',
            'action' => 'success'
        ];
    }

    public function toBroadcast($notifiable) {
        $notification = [
            'data' => [
                'user_id' => $this->user->id,
                'message' => 'Your destination to '.$this->booking->destination.' on '. (Carbon::parse($this->booking->booking_start))->format('M d, Y').' is successfully booked!',
                'title' => 'Booking',
                'link' => '/user/bookings',
                'action' => 'success'
            ]
        ];

        return new BroadcastMessage([
            'notification' => $notification
        ]);
    }
}
