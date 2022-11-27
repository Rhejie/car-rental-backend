<?php

namespace App\Services\Admin;

use App\Models\VehicleImage;

class VehicleImageService {

    public function upload($params) {
        $model = new VehicleImage();
        $model->image_url = $params->link;
        $model->vehicle_id = $params->vehicle_id;
        $model->save();

        return response()->json($model);
    }

    public function undo($request) {
        $model = VehicleImage::find($request->id);
        if($model) {
            $model->delete();
        }
        return response()->json(['message' => 'Deleted successfully']);
    }
}
