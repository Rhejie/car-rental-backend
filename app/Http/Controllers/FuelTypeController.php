<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuelType\StoreRequest;
use App\Services\Admin\FuelTypeService;
use Illuminate\Http\Request;

class FuelTypeController extends Controller
{
    private $fuelTypeService ;
    public function __construct() {
        $this->fuelTypeService = new FuelTypeService();
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
        return $this->fuelTypeService->list(json_decode(json_encode($params)));
    }

    public function store(StoreRequest $request) {

        return $this->fuelTypeService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->fuelTypeService->update($request, $id);

    }

    public function trash($id) {

        return $this->fuelTypeService->trash($id);

    }

    public function forceDelete($id){
        return $this->fuelTypeService->forceDelete($id);
    }

    public function restore($id) {

        return $this->fuelTypeService->restore($id);
    }

    public function selectFuelType(Request $request)
    {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $params = [
            'search' => $search
        ];
        return $this->fuelTypeService->selectFuelType(json_decode(json_encode($params)));
    }
}
