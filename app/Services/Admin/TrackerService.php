<?php

namespace App\Services\Admin;

use App\Models\Tracker;

class TrackerService
{

    public function list($params)
    {
        $overcharges = Tracker::with(['vehicle']);

        if ($params->search) {

            $overcharges = $overcharges->where(function ($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $overcharges;
        }

        $overcharges = $overcharges->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($overcharges, 200);
    }

    public function getTrackerById($id)
    {

        $tracker = Tracker::with(['vehicle'])->find($id);

        return $tracker;
    }

    public function store($request)
    {

        $model = new Tracker();
        $model->name = $request->name;
        $model->save();

        return response()->json($this->getTrackerById($model->id), 200);
    }

    public function update($request, $id)
    {

        $model = Tracker::find($id);
        $model->name = $request->name;
        $model->save();

        return response()->json($this->getTrackerById($model->id), 200);
    }

    public function trash($id)
    {

        $model = Tracker::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id)
    {

        $model = Tracker::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id)
    {

        $model = Tracker::find($id);
        if ($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = Tracker::onlyTrashed()->find($id);
        if ($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }
    }

    public function selectTrackers($params)
    {
        $model = Tracker::with(['vehicle']);

        if ($params->search) {
            $model = $model->where(function ($query)  use ($params) {
                $query->where('name', 'LIKE', "%$params->search%");
                $query->orWhereHas('company', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%$params->search%");
                });
            });
        }

        $model = $model->limit(50)->get();

        return response()->json($model);
    }

    public function getTrackerByName($name) {

        $model = Tracker::where('name', $name)->first();

        return $model;
    }
}
