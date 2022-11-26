<?php

namespace App\Services\Admin;

use App\Models\Company;

class CompanyService {

    public function list($params)
    {
        $companies = Company::query();

        if($params->search) {

            $companies = $companies->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $companies;

        }

        $companies = $companies->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($companies, 200);
    }

    public function store($request) {

        $model = new Company();
        $model->name = $request->name;
        $model->save();

        return response()->json($model, 200);
    }

    public function update($request, $id) {

        $model = Company::find($id);
        $model->name = $request->name;
        $model->save();

        return response()->json($model, 200);

    }

    public function trash($id) {

        $model = Company::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id) {

        $model = Company::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id) {

        $model = Company::find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = Company::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }

    }
}
