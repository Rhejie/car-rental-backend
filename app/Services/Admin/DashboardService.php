<?php

namespace App\Services\Admin;

use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;

class DashboardService {

    public function  dashboardData() {
        $usersCount = User::where('role_id', 2)->count();
        $usersVerified = User::whereNotNull('admin_verified_at')->where('role_id', 2)->count();
        $countUnVerifiedAccount = User::whereNull('admin_verified_at')->count();
        $totalBookings = Booking::count();
        $totalPendingBookings = Booking::where('booking_status', 'pending')->count();
        $totalAcceptBookings = Booking::where('booking_status', 'accept')->count();
        $totalCancelBookings = Booking::where('booking_status', 'cancel')->count();
        $totalDeclineBookings = Booking::where('booking_status', 'decline')->count();
        $totalDeployedBookings = Booking::where('deployed', true)->count();
        $totalReturnedBookings = Booking::where('returned', true)->count();
        $totalVehicles = Vehicle::count();

        return response()->json([
            'users_count' => $usersCount,
            'usersVerified' => $usersVerified,
            'count_unverified_account' => $countUnVerifiedAccount,
            'total_bookings' => $totalBookings,
            'total_pending_bookings' => $totalPendingBookings,
            'total_accept_bookings' => $totalAcceptBookings,
            'total_cancel_bookings' => $totalCancelBookings,
            'total_decline_bookings' => $totalDeclineBookings,
            'total_deployed_bookings' => $totalDeployedBookings,
            'total_returned_bookings' => $totalReturnedBookings,
            'total_vehicles' => $totalVehicles
        ]);
    }

    public function countUsers() {

        $model = User::where('role_id', 2)->count();

        return response()->json($model);

    }

    // done
    public function countVerifiedAccount() {
        $model = User::whereNotNull('admin_verified_at')->where('role_id', 2)->count();

        return response()->json($model);
    }

    // done
    public function countUnVerifiedAccount() {
        $model = User::whereNull('admin_verified_at')->count();

        return response()->json($model);
    }

    // done
    public function countTotalBookings() {
        $model = Booking::count();

        return response()->json($model);
    }

    // done
    public function countPendingBookings() {

        $model = Booking::where('booking_status', 'pending')->count();

        return response()->json($model);

    }

    // done
    public function countAcceptBookings() {
        $model = Booking::where('booking_status', 'accept')->count();

        return response()->json($model);
    }

    // done
    public function countCancelBookings() {
        $model = Booking::where('booking_status', 'cancel')->count();

        return response()->json($model);
    }
    // done
    public function countDeclineBookings() {
        $model = Booking::where('booking_status', 'decline')->count();

        return response()->json($model);
    }

    // done
    public function countDeployedBookings() {

        $model = Booking::where('deployed', true)->count();

        return response()->json($model);
    }

    // done
    public function countReturnedBookings() {

        $model = Booking::where('returned', true)->count();

        return response()->json($model);
    }


    // done
    public function countVehicles() {

        $model = Vehicle::count();

        return response()->json($model);
    }


}
