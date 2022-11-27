<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleBrand\StoreRequest;
use App\Services\Admin\VehicleBrandService;
use Illuminate\Http\Request;

class VehicleBrandController extends Controller
{

    private $vehicleBrandService ;
    public function __construct() {
        $this->vehicleBrandService = new VehicleBrandService();
    }

    public function list(Request $request)
    {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];
        return $this->vehicleBrandService->list(json_decode(json_encode($params)));
    }

    public function store(StoreRequest $request) {

        return $this->vehicleBrandService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->vehicleBrandService->update($request, $id);

    }

    public function trash($id) {

        return $this->vehicleBrandService->trash($id);

    }

    public function forceDelete($id){
        return $this->vehicleBrandService->forceDelete($id);
    }

    public function restore($id) {

        return $this->vehicleBrandService->restore($id);
    }

    public function selectVehicleBrand(Request $request)
    {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $params = [
            'search' => $search
        ];
        return $this->vehicleBrandService->selectVehicleBrand(json_decode(json_encode($params)));
    }
}
