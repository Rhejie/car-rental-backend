<?php

namespace App\Services\Admin;

use App\Models\Form;

class FormService {

    public function list($params)
    {
        $forms = Form::query();

        if ($params->search) {

            $forms = $forms->where(function ($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $forms;
        }

        $forms = $forms->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($forms, 200);
    }

    public function selectForm()
    {

        $res = Form::get();

        return response()->json($res, 200);
    }

    public function store($request)
    {

        $model = new Form();
        $model->name = $request->name;
        $model->file_url = $request->file_url;
        $model->save();

        return response()->json($model, 200);
    }

    public function update($request, $id)
    {

        $model = Form::find($id);
        $model->name = $request->name;
        $model->file_url = $request->file_url;
        $model->save();

        return response()->json($model, 200);
    }

    public function trash($id)
    {

        $model = Form::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id)
    {

        $model = Form::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id)
    {

        $model = Form::find($id);
        if ($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = Form::onlyTrashed()->find($id);
        if ($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }
    }
}