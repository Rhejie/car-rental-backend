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
        $model->save();
    }
}
