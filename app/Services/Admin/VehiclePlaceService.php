<?php

namespace App\Services\Admin;

use App\Models\VehiclePlaces;

class VehiclePlaceService
{

    public function list($params, $vehicle_id)
    {
        $places = VehiclePlaces::with(['place']);

        if(isset($vehicle_id) && $vehicle_id) {
            $places = $places->where('vehicle_id', $vehicle_id);
        }

        if ($params->search) {

            $places = $places->where(function ($query) use ($params) {
                $query->orWhere('from', 'LIKE', "%$params->search%");
                $query->orWhereHas('place', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%$params->search%");
                });
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $places;
        }

        $places = $places->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($places, 200);
    }

    public function getVehiclePlaceById($id)
    {

        $tracker = VehiclePlaces::with(['place'])->find($id);

        return $tracker;
    }

    public function store($request)
    {

        $model = new VehiclePlaces();
        $model->from = $request->from;
        $model->place_id = $request->place['id'];
        $model->price = $request->price;
        $model->vehicle_id = $request->vehicle_id;
        $model->save();

        return response()->json($this->getVehiclePlaceById($model->id), 200);
    }

    public function update($request, $id)
    {

        $model = VehiclePlaces::find($id);
        $model->from = $request->from;
        $model->place_id = $request->place['id'];
        $model->price = $request->price;
        $model->vehicle_id = $request->vehicle_id;
        $model->save();

        return response()->json($this->getVehiclePlaceById($model->id), 200);
    }

    public function trash($id)
    {

        $model = VehiclePlaces::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id)
    {

        $model = VehiclePlaces::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id)
    {

        $model = VehiclePlaces::find($id);
        if ($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = VehiclePlaces::onlyTrashed()->find($id);
        if ($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }
    }

    public function selectVehiclePlaces($params)
    {
        $model = VehiclePlaces::with(['company', 'vehicle']);

        if ($params->search) {
            $model = $model->where(function ($query)  use ($params) {
                $query->where('from', 'LIKE', "%$params->search%");
                $query->orWhereHas('place', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%$params->search%");
                });
            });
        }

        $model = $model->get();

        return response()->json($model);
    }
}
