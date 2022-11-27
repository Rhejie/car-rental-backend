<?php

namespace App\Services\Admin;

use App\Models\FuelType;

class FuelTypeService {

    public function list($params) {

        $roles = FuelType::query();

        if($params->search) {

            $roles = $roles->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $roles;

        }

        $roles = $roles->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($roles, 200);

    }


    public function store($request)
    {

        $model = new FuelType();
        $model->name = $request->name;
        $model->save();
        return $model;

    }


    public function update($request, $id)
    {

        $model = FuelType::find($id);
        $model->name = $request->name;
        $model->save();
        return $model;

    }

    public function restore($id) {

        $model = FuelType::onlyTrashed()->find($id);
        if($model) {
            $model->restore();

            return ['message' => 'Successfully restored'];
        }

    }

    public function trash($id) {
        $model = FuelType::find($id);
        $model->delete();

        return ['message' => 'Successfully deleted'];
    }

    public function forceDelete($id) {
        $model = FuelType::find($id);
        if($model) {
            $model->forceDelete();
            return ['message' => 'Permanently deleted'];
        }
        $model = FuelType::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return ['message' => 'Permanently deleted'];
        }
    }

    public function selectFuelType() {

        $model = FuelType::get();

        return response()->json($model);
    }
}
