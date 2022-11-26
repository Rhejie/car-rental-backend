<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreRequest;
use App\Services\Admin\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $companyService;

    public function __construct() {

        $this->companyService = new CompanyService();

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
        return $this->companyService->list(json_decode(json_encode($params)));
    }

    public function selectCompany() {

        return $this->companyService->selectCompany();

    }

    public function store(StoreRequest $request) {

        return $this->companyService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->companyService->update($request, $id);

    }

    public function trash($id) {

        return $this->companyService->trash($id);

    }

    public function forceDelete($id){

        return $this->companyService->forceDelete($id);

    }

    public function restore($id) {

        return $this->companyService->restore($id);
    }
}
