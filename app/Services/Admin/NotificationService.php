<?php

namespace App\Services\Admin;

use Carbon\Carbon;

class NotificationService {

    public function store($params) {
        // $model = null;
        // $model->user_id = $params['user_id'];
        // $model->message = $params['message'];
        // $model->link = $params['link'];
        // $model->title = $params['title'];
        // $model->action = $params['action'];
        // $model->save();
    }

    public function getMyNotifications() {

        $model = auth()->user()->notifications;

        return response()->json($model);
    }
}
