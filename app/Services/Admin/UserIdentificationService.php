<?php

namespace App\Services\Admin;

use App\Models\UserIdentification;

class UserIdentificationService {

    public function store($request) {

        $model = new UserIdentification();
        $model->image_url = $request->image_url;
        $model->user_id = isset($request->user_id) && $request->user_id ? $request->user_id : auth()->user()->id;
        $model->save();

        return $model;
    }
}
