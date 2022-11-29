<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\Places\StoreRequest;
use App\Services\Admin\VehiclePlaceService;
use Illuminate\Http\Request;

class VehiclePlacesController extends Controller
{
    private $vehiclePlaceService;

    public function __construct() {
        $this->vehiclePlaceService = new VehiclePlaceService();
    }

    public function list(Request $request, $vehicle_id)
    {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];

        return $this->vehiclePlaceService->list(json_decode(json_encode($params)), $vehicle_id);
    }

    public function show($id) {

        return response()->json($this->vehiclePlaceService->getVehiclePlaceById($id));

    }

    public function selectVehiclePlaces(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;

        $params = [
            'search' => $search
        ];

        return $this->vehiclePlaceService->selectVehiclePlaces(json_decode(json_encode($params)));

    }

    public function store(StoreRequest $request) {

        return $this->vehiclePlaceService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->vehiclePlaceService->update($request, $id);

    }

    public function trash($id) {

        return $this->vehiclePlaceService->trash($id);

    }

    public function forceDelete($id){

        return $this->vehiclePlaceService->forceDelete($id);

    }

    public function restore($id) {

        return $this->vehiclePlaceService->restore($id);
    }
}
