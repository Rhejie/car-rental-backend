<?php

namespace App\Services\Admin;

use App\Models\Places;

class PlacesService {

    public function list($params) {

        $places = Places::query();

        if($params->search) {

            $places = $places->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $places;

        }

        $places = $places->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($places, 200);

    }


    public function store($request)
    {

        $model = new Places();
        $model->name = $request->name;
        $model->save();
        return $model;

    }


    public function update($request, $id)
    {

        $model = Places::find($id);
        $model->name = $request->name;
        $model->save();
        return $model;

    }

    public function restore($id) {

        $model = Places::onlyTrashed()->find($id);
        if($model) {
            $model->restore();

            return ['message' => 'Successfully restored'];
        }

    }

    public function trash($id) {
        $model = Places::find($id);
        $model->delete();

        return ['message' => 'Successfully deleted'];
    }

    public function forceDelete($id) {
        $model = Places::find($id);
        if($model) {
            $model->forceDelete();
            return ['message' => 'Permanently deleted'];
        }
        $model = Places::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return ['message' => 'Permanently deleted'];
        }
    }

    public function selectPlace($params) {

        $model = Places::query();

        if($params->search) {
            $model = $model->where('name', 'LIKE', "%$params->search%");
        }

        $model = $model->limit(50)->get();

        return response()->json($model);
    }
}
