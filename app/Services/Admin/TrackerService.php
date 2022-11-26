<?php

namespace App\Services\Admin;

use App\Models\Tracker;

class TrackerService {

    public function list($params)
    {
        $overcharges = Tracker::with(['company']);

        if($params->search) {

            $overcharges = $overcharges->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $overcharges;

        }

        $overcharges = $overcharges->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($overcharges, 200);
    }

    public function getTrackerById($id){

        $tracker = Tracker::with(['company'])->find($id);

        return $tracker;
    }

    public function store($request) {

        $model = new Tracker();
        $model->name = $request->name;
        $model->company_id = $request->company_id;
        $model->save();

        return response()->json($this->getTrackerById($model->id), 200);
    }

    public function update($request, $id) {

        $model = Tracker::find($id);
        $model->name = $request->name;
        $model->company_id = $request->company_id;
        $model->save();

        return response()->json($this->getTrackerById($model->id), 200);

    }

    public function trash($id) {

        $model = Tracker::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id) {

        $model = Tracker::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id) {

        $model = Tracker::find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = Tracker::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }

    }
}
