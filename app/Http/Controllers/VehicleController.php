<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\CreateRequest;
use App\Http\Requests\Vehicle\UpdateRequest;
use App\Http\Requests\Vehicle\UploadRequest;
use App\Services\Admin\VehicleService;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    private $vehicleService ;

    public function __construct() {

        $this->vehicleService = new VehicleService();

    }

    public function list(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;
        $colors = $request->colors ? $request->colors : '';
        $brands = $request->brands ? $request->brands : '';
        $fuelTypes = $request->fuelTypes ? $request->fuelTypes : '';
        $place_id= $request->place ? $request->place : null;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count,
            'colors' => explode(',', $colors),
            'brands' => explode(',', $brands),
            'fuelTypes' => explode(',', $fuelTypes),
            'place_id' => $place_id
        ];

        return $this->vehicleService->list(json_decode(json_encode($params)));
    }

    public function create(CreateRequest $request) {
        return $this->vehicleService->create($request);
    }

    public function update($id, UpdateRequest $request) {
        return $this->vehicleService->update($id, $request);
    }

    public function show($id)
    {

        return response()->json($this->vehicleService->getVehicleById($id), 200);

    }

    public function upload(UploadRequest $request) {

        return $this->vehicleService->upload($request);
    }

    public function undo(Request $request) {

        return $this->vehicleService->undo(json_decode(json_encode($request->all())));
    }

    public function selectVehicle(Request $request) {

        $search = $request->search ? $request->search: null ;

        $params = [
            'search' => $search
        ];

        return $this->vehicleService->selectVehicle(json_decode(json_encode($params)));

    }
}
