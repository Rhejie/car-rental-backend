<?php

namespace App\Services\Admin;

use App\Models\Driver;
use Carbon\Carbon;

class DriverServices {

    public function list($params)
    {
        $drivers = Driver::query();

        if($params->search) {

            $drivers = $drivers->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
                $query->orWhere('availabilty', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $drivers;

        }

        $drivers = $drivers->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($drivers, 200);
    }

    public function selectDriver( $search) {

        $res = Driver::where('status', true)->where('license_expiration_date', '>', Carbon::now());

        if($search) {

            $res = $res->where('name', 'LIKE', "%$search%");

        }

        $res = $res->get();

        return response()->json($res, 200);
    }

    public function store($request) {

        $model = new Driver();
        $model->name = $request->name;
        $model->license_no = $request->license_no;
        $model->license_expiration_date = $request->license_expiration_date;
        $model->contact_number = $request->contact_number;
        $model->status = true;
        $model->save();

        return response()->json($model, 200);
    }

    public function update($request, $id) {

        $model = Driver::find($id);
        $model->name = $request->name;
        $model->license_no = $request->license_no;
        $model->license_expiration_date = $request->license_expiration_date;
        $model->contact_number = $request->contact_number;
        $model->save();

        return response()->json($model, 200);

    }

    public function trash($id) {

        $model = Driver::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id) {

        $model = Driver::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id) {

        $model = Driver::find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = Driver::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }

    }

    public function updateDriverStatus($id, $status) {
        $model = Driver::find($id);
        $model->status = $status;
        $model->save();
    }
}
