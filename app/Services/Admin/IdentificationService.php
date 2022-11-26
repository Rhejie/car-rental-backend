<?php

namespace App\Services\Admin;

use App\Models\Identification;

class IdentificationService {

    public function list($params)
    {
        $identifications = Identification::query();

        if($params->search) {

            $identifications = $identifications->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $identifications;

        }

        $identifications = $identifications->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($identifications, 200);
    }

    public function store($request) {

        $model = new Identification();
        $model->name = $request->name;
        $model->save();

        return response()->json($model, 200);
    }

    public function update($request, $id) {

        $model = Identification::find($id);
        $model->name = $request->name;
        $model->save();

        return response()->json($model, 200);

    }

    public function trash($id) {

        $model = Identification::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id) {

        $model = Identification::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id) {

        $model = Identification::find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = Identification::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }

    }
}
