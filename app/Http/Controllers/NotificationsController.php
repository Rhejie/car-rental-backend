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


    public function getMyNotifications(Request $request) {
        $params = [
            'status_filter' => $request->status_filter ? $request->status_filter : 'ALL'
        ];
        return $this->notficationsService->getMyNotifications(json_decode(json_encode($params)));
    }

    public function viewNotif($id) {

        $user = User::find($id);
        $user->unreadNotifications()->update(['read_at' => now()]);

    }
}
