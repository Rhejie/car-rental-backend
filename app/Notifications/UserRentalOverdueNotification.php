<?php

namespace App\Notifications;

use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRentalOverdueNotification extends Notification
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
            'message' => 'This is to inform you that booking of rent for' . $this->booking->vehicle->model . ' | ' .
                $this->booking->vehicle->make . ' | ' .  $this->booking->vehicle->plate_number . '| returned: ' . (Carbon::parse($this->booking->booking_end))->format('M d, Y'). ' is overdue.',
            'title' => 'Rental Overdue',
            'link' => '/user/bookings',
            'action' => 'fail'
        ];
    }

    public function toBroadcast($notifiable)
    {
        $notification = [
            'data' => [
                'user_id' => $this->user->id,
                'message' => 'This is to inform you that booking of rent for' . $this->booking->vehicle->model . ' | ' .
                $this->booking->vehicle->make . ' | ' .  $this->booking->vehicle->plate_number . '| returned: ' . (Carbon::parse($this->booking->booking_end))->format('M d, Y'). ' is overdue.',
                'title' => 'Rental Overdue',
                'link' => '/user/bookings',
                'action' => 'fail'
            ]
        ];

        return new BroadcastMessage([
            'notification' => $notification
        ]);
    }
}
