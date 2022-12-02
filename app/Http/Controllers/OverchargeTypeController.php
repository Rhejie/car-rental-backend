<?php

namespace App\Http\Controllers;

use App\Http\Requests\Overcharge\types\StoreRequest;
use App\Services\Admin\OverchargeTypesService;
use Illuminate\Http\Request;

class OverchargeTypeController extends Controller
{
    private $overchargeTypesService;
    public function __construct()
    {
        $this->overchargeTypesService = new OverchargeTypesService();
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
        return $this->overchargeTypesService->list(json_decode(json_encode($params)));
    }

    public function store(StoreRequest $request) {

        return $this->overchargeTypesService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->overchargeTypesService->update($request, $id);

    }

    public function trash($id) {

        return $this->overchargeTypesService->trash($id);

    }

    public function forceDelete($id){
        return $this->overchargeTypesService->forceDelete($id);
    }

    public function restore($id) {

        return $this->overchargeTypesService->restore($id);
    }

    public function selectOvercharge() {
        return $this->overchargeTypesService->selectOvercharge();
    }
}
