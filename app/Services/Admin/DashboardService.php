<?php

namespace App\Services\Admin;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;

class DashboardService {

    public function countUsers() {

        $model = User::where('role_id', '!=', 2)->count();

        return response()->json($model);

    }

    public function countVerifiedAccount() {
        $model = User::whereNotNull('admin_verified_at')->count();

        return response()->json($model);
    }

    public function countUnVerifiedAccount() {
        $model = User::whereNull('admin_verified_at')->count();

        return response()->json($model);
    }

    public function countTotalBookings() {
        $model = Booking::count();

        return response()->json($model);
    }

    public function countPendingBookings() {

        $model = Booking::where('booking_status', 'pending')->count();

        return response()->json($model);

    }

    public function countAcceptBookings() {
        $model = Booking::where('booking_status', 'accept')->count();

        return response()->json($model);
    }

    public function countCancelBookings() {
        $model = Booking::where('booking_status', 'cancel')->count();

        return response()->json($model);
    }
    public function countDeclineBookings() {
        $model = Booking::where('booking_status', 'decline')->count();

        return response()->json($model);
    }

    public function countDeployedBookings() {

        $model = Booking::where('deployed', true)->count();

        return response()->json($model);
    }


    public function countReturnedBookings() {

        $model = Booking::where('returned', true)->count();

        return response()->json($model);
    }

    public function countVehicles() {

        $model = Vehicle::count();

        return response()->json($model);
    }


}
