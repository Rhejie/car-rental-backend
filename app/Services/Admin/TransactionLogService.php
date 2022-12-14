<?php

namespace App\Services\Admin;

use App\Models\Driver;
use App\Models\Payment;
use App\Models\TransactionLog;
use App\Models\VehicleMaintenance;

class TransactionLogService
{

    public function getTotalIncome () {
        $model = Payment::sum('price');
        return response()->json($model);
    }

    public function getTotalExpenses () {
        $model = VehicleMaintenance::sum('price');
        return response()->json($model);
    }

    public function paymentList($params) {

        $roles = Payment::with(['booking']);

        if($params->search) {

            $roles = $roles->where(function($query) use ($params) {
                $query->orWhere('type', 'LIKE', "%$params->search%");
                $query->whereHas('paymentMode', function ($query) use ($params) {
                    $query->where('name', 'LIKE', "%$params->search");
                });
            });

        }

        if($params->year) {
            $roles = $roles->whereYear('created_at', $params->year);
        }

        if($params->year && $params->month) {
            $roles = $roles->whereMonth('created_at', $params->month);
        }

        $roles = $roles->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($roles, 200);
    }

    public function getDriversReport($params) {

        $drivers = Driver::withCount('booking');

        if($params->search) {

            $drivers = $drivers->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            });

        }

        if($params->year) {
            $drivers = $drivers->whereHas('booking', function ($query) use ($params) {
                $query->whereYear('created_at', $params->year);
            });
        }

        if($params->year && $params->month) {
            $drivers = $drivers->whereHas('booking', function ($query) use ($params) {
                $query->whereMonth('created_at', $params->month);
            });
        }

        $drivers = $drivers->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($drivers, 200);

    }

    public function expensesList($params) {
        $expenses = VehicleMaintenance::with(['vehicle.vehicleBrand']);

        if($params->search) {

            $expenses = $expenses->where(function($query) use ($params) {
                $query->orWhere('type', 'LIKE', "%$params->search%");
                $query->orWhereHas('vehicle', function ($query) use ($params) {
                    $query->orWhere('model', 'LIKE', "%$params->search");
                    $query->orWhere('make', 'LIKE', "%$params->search");
                    $query->orWhere('plate_number', 'LIKE', "%$params->search");
                });
            });

        }

        if($params->year) {
            $expenses = $expenses->whereYear('created_at', $params->year);
        }

        if($params->year && $params->month) {
            $expenses = $expenses->whereMonth('created_at', $params->month);
        }

        $expenses = $expenses->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($expenses, 200);
    }

    public function getAllMonths()
    {
        $month = [];

        for ($m = 1; $m <= 12; $m++) {
            $month[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
        }

        return response()->json($month);
    }

    public function store($request)
    {
        $model = new TransactionLog();
        $model->transactionable_type = $request['transactionable_type'];
        $model->transactionable_id = $request['transactionable_id'];
        $model->type = $request['type'];
        $model->process = $request['process'];
        $model->save();
    }

    public function dailyReport($date)
    {
        if ($date) {

            $models = TransactionLog::with(['transactionable'])->whereDate('created_at', $date)->get();

            return response()->json($models);
        }

        return response()->json(['message' => 'No available']);
    }

    public function monthlyReport($month, $year) {

        if ($year && $month) {

            $models = TransactionLog::with(['transactionable'])->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();

            return response()->json($models);

        }

        return response()->json(['message' => 'No available']);
    }
}
