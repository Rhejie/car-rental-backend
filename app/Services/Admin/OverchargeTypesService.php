<?php

namespace App\Services\Admin;

use App\Models\OverchargeType;

class OverchargeTypesService {

    public function list($params)
    {
        $overcharges = OverchargeType::query();

        if($params->search) {

            $overcharges = $overcharges->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $overcharges;

        }

        $overcharges = $overcharges->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($overcharges, 200);
    }

    public function store($request) {

        $model = new OverchargeType();
        $model->name = $request->name;
        $model->save();

        return response()->json($model, 200);
    }

    public function update($request, $id) {

        $model = OverchargeType::find($id);
        $model->name = $request->name;
        $model->save();

        return response()->json($model, 200);

    }

    public function trash($id) {

        $model = OverchargeType::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id) {

        $model = OverchargeType::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id) {

        $model = OverchargeType::find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = OverchargeType::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }

    }
}
