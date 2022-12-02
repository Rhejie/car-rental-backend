<?php

namespace App\Services\Admin;

use App\Models\Payment;

class PaymentService {

    public function store($request, $booking_id = null) {

        $model = new Payment();
        $model->type = $request->type;
        $model->booking_id = $booking_id ? $booking_id :$request->booking_id;
        $model->reference_number = $request->reference_number;
        $model->price = $request->price;
        $model->payment_mode_id = $request->payment_method['id'];
        $model->save();


        return response()->json($this->paymentById($model->id));

    }

    public function paymentById($id) {

        return  Payment::with(['paymentMode', 'booking'])->find($id);

    }

    public function paymentHistoryByBooking($id) {

        $history = Payment::with(['booking', 'paymentMode'])->where('booking_id', $id)->get();

        return response()->json($history);
    }
}
