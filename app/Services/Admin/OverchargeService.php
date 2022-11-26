<?php

namespace App\Services\Admin;

use App\Models\Overcharge;

class OverchargeTypesService {

    public function list($params)
    {
        $overcharges = Overcharge::with(['booking', 'overchargeType'])->query();

        if($params->search) {

            $overcharges = $overcharges->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
                $query->orWhereHas('booking', function ($query) use ($params) {

                });
                $query->orWhereHas('overchargeType', function ($query) use ($params) {

                });
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $overcharges;

        }

        $overcharges = $overcharges->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($overcharges, 200);
    }

    public function getOvercharge($model) {

        $model = Overcharge::with(['overchargeType', 'booking'])->find($model->id);

        return $model;
    }

    public function store($request) {

        $model = new Overcharge();
        $model->charge = $request->charge;
        $model->booking_id = $request->booking_id;
        $model->overcharge_type_id = $request->overcharge_type_id;
        $model->save();

        return response()->json($this->getOvercharge($model), 200);
    }

    public function update($request, $id) {

        $model = Overcharge::find($id);
        $model->charge = $request->charge;
        $model->booking_id = $request->booking_id;
        $model->overcharge_type_id = $request->overcharge_type_id;
        $model->save();

        return response()->json($this->getOvercharge($model), 200);

    }

    public function trash($id) {

        $model = Overcharge::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id) {

        $model = Overcharge::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id) {

        $model = Overcharge::find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = Overcharge::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }

    }
}
