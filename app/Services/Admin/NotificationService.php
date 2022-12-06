<?php

namespace App\Services\Admin;

use App\Models\Notifications;
use Carbon\Carbon;

class NotificationService {

    public function store($params) {
        $model = new Notifications();
        $model->user_id = $params['user_id'];
        $model->message = $params['message'];
        $model->link = $params['link'];
        $model->title = $params['title'];
        $model->action = $params['action'];
        $model->save();
    }

    public function getMyNotifications() {

        $model = Notifications::where('user_id', auth()->user()->id)->whereDate('created_at', '>', (Carbon::now())->subDays(14))->orderBy('id', 'DESC')->get();

        return response()->json($model);
    }
}
