<?php

namespace App\Services\Admin;

use App\Models\Color;

class ColorService {

    public function list($params) {

        $roles = Color::query();

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

        $model = new Color();
        $model->name = $request->name;
        $model->save();
        return $model;

    }


    public function update($request, $id)
    {

        $model = Color::find($id);
        $model->name = $request->name;
        $model->save();
        return $model;

    }

    public function restore($id) {

        $model = Color::onlyTrashed()->find($id);
        if($model) {
            $model->restore();

            return ['message' => 'Successfully restored'];
        }

    }

    public function trash($id) {
        $model = Color::find($id);
        $model->delete();

        return ['message' => 'Successfully deleted'];
    }

    public function forceDelete($id) {
        $model = Color::find($id);
        if($model) {
            $model->forceDelete();
            return ['message' => 'Permanently deleted'];
        }
        $model = Color::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return ['message' => 'Permanently deleted'];
        }
    }

    public function selectColor($params) {

        $model = Color::query();

        if($params->search) {
            $model = $model->where('name', 'LIKE', "%$params->search%");
        }

        $model = $model->limit(50)->get();

        return response()->json($model);
    }
}
