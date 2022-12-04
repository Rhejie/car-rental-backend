<?php

namespace App\Http\Controllers;

use App\Services\Admin\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $dashboardService;

    public function __construct() {
        $this->dashboardService = new DashboardService();
    }

    public function countUsers() {
        return $this->dashboardService->countUsers();
    }

    public function countVerifiedAccount() {
        return $this->dashboardService->countVerifiedAccount();
    }

    public function countUnVerifiedAccount() {
        return $this->dashboardService->countUnVerifiedAccount();
    }

    public function countTotalBookings() {
        return $this->dashboardService->countTotalBookings();
    }

    public function countPendingBookings() {
        return $this->dashboardService->countPendingBookings();
    }

    public function countAcceptBookings() {
        return $this->dashboardService->countAcceptBookings();
    }

    public function countCancelBookings() {
        return $this->dashboardService->countCancelBookings();
    }

    public function countDeclineBookings() {
        return $this->dashboardService->countDeclineBookings();
    }

    public function countDeployedBookings() {
        return $this->dashboardService->countDeployedBookings();
    }

    public function countReturnedBookings() {
        return $this->dashboardService->countReturnedBookings();
    }

    public function countVehicles() {
        return $this->dashboardService->countVehicles();
    }
}
