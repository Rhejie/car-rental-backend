<?php

namespace App\Http\Controllers;

use App\Http\Requests\Driver\StoreRequest;
use App\Services\Admin\DriverServices;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    private $driverService;

    public function __construct() {

        $this->driverService = new DriverServices();

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

        return $this->driverService->list(json_decode(json_encode($params)));

    }

    public function selectDriver(Request $request) {

        $days = $request->day ? $request->day : null;
        $search = $request->search && $request->search != '' ?  $request->search : null;

        return $this->driverService->selectDriver($days, $search);

    }

    public function store(StoreRequest $request) {

        return $this->driverService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->driverService->update($request, $id);

    }

    public function trash($id) {

        return $this->driverService->trash($id);

    }

    public function forceDelete($id){

        return $this->driverService->forceDelete($id);

    }

    public function restore($id) {

        return $this->driverService->restore($id);

    }
}
