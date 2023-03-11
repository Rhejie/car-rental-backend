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

    public function getMyNotifications($params) {

        $model = auth()->user()->notifications;
        $searchTerm = null;

        if($params->status_filter != 'ALL') {

            if($params->status_filter == 'ACCEPT') {
                $searchTerm = 'successfuly reserve';
                $model = collect($model)->filter(function ($item) use ($searchTerm) {
                    return str_contains(strtolower(implode(', ', $item['data'])), strtolower($searchTerm));
                });
            }

            if($params->status_filter == 'PENDING') {
                $searchTerm = 'is reserve';
                $model = collect($model)->filter(function ($item) use ($searchTerm) {
                    return str_contains(strtolower(implode(', ', $item['data'])), strtolower($searchTerm));
                });
            }

            if($params->status_filter == 'CANCEL') {
                $searchTerm = 'cancelled';
                $model = collect($model)->filter(function ($item) use ($searchTerm) {
                    return str_contains(strtolower(implode(', ', $item['data'])), strtolower($searchTerm));
                });
            }

            if($params->status_filter == 'REJECTED') {
                $searchTerm = 'declined';
                $model = collect($model)->filter(function ($item) use ($searchTerm) {
                    return str_contains(strtolower(implode(', ', $item['data'])), strtolower($searchTerm));
                });
            }

            if($params->status_filter == 'RETURNED') {
                $searchTerm = 'returned';
                $model = collect($model)->filter(function ($item) use ($searchTerm) {
                    return str_contains(strtolower(implode(', ', $item['data'])), strtolower($searchTerm));
                });
            }

            if($params->status_filter == 'DEPLOYED') {
                $searchTerm = 'deployed';
                $model = collect($model)->filter(function ($item) use ($searchTerm) {
                    return str_contains(strtolower(implode(', ', $item['data'])), strtolower($searchTerm));
                });
            }

            if($params->status_filter == 'RENTAL_OVERDUE') {
                $searchTerm = 'Rental Overdue';
                $model = collect($model)->filter(function ($item) use ($searchTerm) {
                    return str_contains(strtolower(implode(', ', $item['data'])), strtolower($searchTerm));
                });
            }
        }

        return response()->json($model);
    }
}
