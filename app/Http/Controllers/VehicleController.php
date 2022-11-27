<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\CreateRequest;
use App\Services\Admin\VehicleService;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $vehicleService ;

    public function __construct() {

        $this->vehicleService = new VehicleService();

    }
    public function create(CreateRequest $request) {
        return $this->vehicleService->create($request);
    }

    public function show($id)
    {

        return response()->json($this->vehicleService->getVehicleById($id), 200);

    }
}
