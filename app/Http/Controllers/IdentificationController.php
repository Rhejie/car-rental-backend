<?php

namespace App\Http\Controllers;

use App\Http\Requests\Identification\StoreRequest;
use App\Services\Admin\IdentificationService;
use Illuminate\Http\Request;

class IdentificationController extends Controller
{
    private $identificationService;

    public function __construct() {
        $this->identificationService = new IdentificationService();
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
        return $this->identificationService->list(json_decode(json_encode($params)));
    }

    public function store(StoreRequest $request) {

        return $this->identificationService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->identificationService->update($request, $id);

    }

    public function trash($id) {

        return $this->identificationService->trash($id);

    }

    public function forceDelete($id){
        return $this->identificationService->forceDelete($id);
    }

    public function restore($id) {

        return $this->identificationService->restore($id);
    }
}
