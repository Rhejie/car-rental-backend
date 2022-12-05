<?php

namespace App\Services\Admin;

use App\Models\PaymentMode;

class PaymentModeService {

    public function list($params)
    {
        $paymentMode = PaymentMode::query();

        if($params->search) {

            $paymentMode = $paymentMode->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $paymentMode;

        }

        $paymentMode = $paymentMode->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($paymentMode, 200);
    }

    public function store($request) {

        $model = new PaymentMode();
        $model->name = $request->name;
        $model->save();

        return response()->json($model, 200);
    }

    public function update($request, $id) {

        $model = PaymentMode::find($id);
        $model->name = $request->name;
        $model->save();

        return response()->json($model, 200);

    }

    public function trash($id) {

        $model = PaymentMode::find($id);
        $model->delete();

        return response()->json(['message' => 'Successfully deleted']);
    }

    public function restore($id) {

        $model = PaymentMode::onlyTrashed()->find($id);
        $model->restore();

        return $model;
    }

    public function forceDelete($id) {

        $model = PaymentMode::find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }


        $model = PaymentMode::onlyTrashed()->find($id);
        if($model) {
            $model->forceDelete();
            return response()->json(['message' => 'Permanently deleted']);
        }

    }

    public function selectPaymentMethod($params) {

        $model = PaymentMode::get();

        return response()->json($model);
    }
}
