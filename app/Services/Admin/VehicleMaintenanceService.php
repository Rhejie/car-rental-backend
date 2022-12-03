<?php

namespace App\Services\Admin;

use App\Jobs\TransactionLogJob;
use App\Models\VehicleMaintenance;

class VehicleMaintenanceService {

    public function list($params, $vehicle_id = null)
    {
        $maintenance = VehicleMaintenance::with(['vehicle.vehicleBrand']);

        if(isset($vehicle_id) && $vehicle_id) {
            $maintenance = $maintenance->where('vehicle_id', $vehicle_id);
        }

        if ($params->search) {

            $maintenance = $maintenance->where(function ($query) use ($params) {
                $query->orWhere('type_of_maintenance', 'LIKE', "%$params->search%");
                $query->orWhere('date', 'LIKE', "%$params->search%");
                $query->orWhereHas('vehicle', function ($query) use ($params) {
                    $query->where('model', 'LIKE', "%$params->search%");
                    $query->orWhereHas('vehicleBrand', function($query) use ($params) {
                        $query->where('name', 'LIKE', "%$params->search%");
                    });
                });
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $maintenance;
        }

        $maintenance = $maintenance->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($maintenance, 200);
    }
    public function store($request) {

        $model = new VehicleMaintenance();
        $model->price = $request->price;
        $model->vehicle_id = $request->vehicle_id;
        $model->type_of_maintenance = $request->type_of_maintenance;
        $model->date = $request->Date;
        $model->estimated_return = $request->estimated_return;
        $model->save();

        $params = [
            'transactionable_type' => 'App\Models\VehicleMaintenance',
            'transactionable_id' => $model->id,
            'type' => 'vehicle_maintenance',
            'process' => 'maintenance'
        ];

        TransactionLogJob::dispatch($params);

        return response()->json($this->getMaintenanceById($model->id));
    }

    public function getMaintenanceById($id) {

        $model = VehicleMaintenance::with(['vehicle'])->find($id);
        return $model;
    }


    public function update($request) {

        $model = VehicleMaintenance::find($request->id);
        $model->price = $request->price;
        $model->vehicle_id = $request->vehicle_id;
        $model->type_of_maintenance = $request->type_of_maintenance;
        $model->date = $request->Date;
        $model->estimated_return = $request->estimated_return;
        $model->save();

        return response()->json($this->getMaintenanceById($model->id));
    }

    public function trash($id) {

        $model = VehicleMaintenance::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id) {
        $model = VehicleMaintenance::onlyTrashed()->find($id);
        $model->restore();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function forceDelete($id) {

        $model1 = VehicleMaintenance::onlyTrashed()->find($id);
        $model2 = VehicleMaintenance::find($id);

        if($model1) {
            $model1->forceDelete();
            return response()->json(['message' => 'Successfully deleted']);
        }

        if($model2) {
            $model2->forceDelete();
            return response()->json(['message' => 'Successfully deleted']);
        }

    }
}
