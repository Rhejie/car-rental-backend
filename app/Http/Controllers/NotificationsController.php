<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Admin\NotificationService;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    private $notficationsService;

    public function __construct() {
        $this->notficationsService = new NotificationService();
    }


    public function getMyNotifications() {
        return $this->notficationsService->getMyNotifications();
    }

    public function viewNotif($id) {

        $user = User::find($id);
        $user->unreadNotifications()->update(['read_at' => now()]);

    }
}
