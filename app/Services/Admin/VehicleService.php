<?php

namespace App\Services\Admin;

use App\Models\Vehicle;
use App\Models\VehicleImage;

class VehicleService {

    private $roleService;
    public function __construct() {
        $this->roleService = new RoleServices();
    }
    public function list($params) {

        $roles = Vehicle::with(['tracker.company', 'color', 'fuelType', 'vehicleImages', 'vehicleBrand']);

        if($params->search) {

            $roles = $roles->where(function($query) use ($params) {
                $query->orWhere('model', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $roles;

        }

        if(($this->roleService->getCurrentUserRole())->name == 'user') {

            $roles = $roles->where('publish', 1);

        }

        $roles = $roles->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($roles, 200);
    }
    public function create($request) {
        $model = new Vehicle();
        $model->model = $request->model;
        $model->tracker_id = $request->tracker['id'];
        $model->color_id = $request->color['id'];
        $model->fuel_type_id = $request->fuel_type['id'];
        $model->vehicle_brand_id = $request->vehicle_brand['id'];
        $model->save();

        return response()->json($this->getVehicleById($model->id));
    }

    public function update($id, $request) {

        $model = Vehicle::find($id);
        $model->model = $request->model;
        $model->tracker_id = $request->tracker['id'];
        $model->color_id = $request->color['id'];
        $model->fuel_type_id = $request->fuel_type['id'];
        $model->vehicle_brand_id = $request->vehicle_brand['id'];
        $model->fuel_capacity = $request->fuel_capacity;
        $model->fuel_consumption = $request->fuel_consumption;
        $model->odometer = $request->odometer;
        $model->plate_number = $request->plate_number;
        $model->cr_no = $request->cr_no;
        $model->engine_no = $request->engine_no;
        $model->chassis_no = $request->chassis_no;
        $model->cr_expiration_date = $request->cr_expiration_date;
        $model->publish = $request->publish;
        $model->capacity = $request->capacity;
        $model->save();

        return response()->json($this->getVehicleById($model->id));

    }

    public function getVehicleById($id) {
        $model = Vehicle::with(['tracker.company', 'color', 'fuelType', 'vehicleImages', 'vehicleBrand'])->find($id);
        return $model;
    }

    public function upload($request) {
        $vehicle = Vehicle::find($request->vehicle_id);

        if ($request->hasFile('file')) {

            $folder = "/vehicle/images";
            $media = $request->file('file');
            $name = $vehicle->model.'--'.time() . '.' . $media->extension();
            $link = $media->storeAs($folder, $name, 'public');



            $params = [
                'vehicle_id' => $request->vehicle_id,
                'link' => $link,
            ];

            $file = new VehicleImageService();


            return $file->upload(json_decode(json_encode($params)));
        }

        return response()->json(['message' => "No file found"]);
    }

    public function undo($request) {

        $file = new VehicleImageService();

        return $file->undo($request);
    }
}
