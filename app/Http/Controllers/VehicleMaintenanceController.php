<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\StoreMaintenanceRequest;
use App\Services\Admin\VehicleMaintenanceService;
use Illuminate\Http\Request;

class VehicleMaintenanceController extends Controller
{

    private $vehicleMaintenanceService;

    public function __construct() {
        $this->vehicleMaintenanceService = new VehicleMaintenanceService();
    }

    public function all(Request $request) {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];
        return $this->vehicleMaintenanceService->all(json_decode(json_encode($params)));
    }

    public function list(Request $request, $vehicle_id = null) {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];
        return $this->vehicleMaintenanceService->list(json_decode(json_encode($params)), $vehicle_id);
    }

    public function store(StoreMaintenanceRequest $request) {
        return $this->vehicleMaintenanceService->store($request);
    }

    public function update(StoreMaintenanceRequest $request) {
        return $this->vehicleMaintenanceService->update($request);
    }

    public function trash($id) {
        return $this->vehicleMaintenanceService->trash($id);
    }


    public function restore($id) {
        return $this->vehicleMaintenanceService->restore($id);
    }

    public function forceDelete($id) {
        return $this->vehicleMaintenanceService->forceDelete($id);
    }
}
