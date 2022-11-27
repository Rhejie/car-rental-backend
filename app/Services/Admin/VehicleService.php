<?php

namespace App\Services\Admin;

use App\Models\Vehicle;

class VehicleService {

    public function create($request) {
        $model = new Vehicle();
        $model->model = $request->model;
        $model->tracker_id = $request->tracker['id'];
        $model->color_id = $request->color['id'];
        $model->save();

        return response()->json($this->getVehicleById($model->id));
    }

    public function getVehicleById($id) {
        $model = Vehicle::with(['tracker', 'color'])->find($id);
        return $model;
    }
}
