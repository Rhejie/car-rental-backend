<?php

namespace App\Services\Admin;

use App\Models\TransactionLog;

class TransactionLogService
{

    public function store($request) {
        $model = new TransactionLog();
        $model->transactionable_type = $request['transactionable_type'];
        $model->transactionable_id = $request['transactionable_id'];
        $model->type = $request['type'];
        $model->process = $request['process'];
        $model->save();
    }

    public function dailyReport($date){
        if($date) {

            $models = TransactionLog::with(['transactionable'])->whereDate('created_at', $date)->get();

            return response()->json($models);

        }

        return response()->json(['message' => 'No available']);
    }
}
