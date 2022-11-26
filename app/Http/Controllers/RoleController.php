<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRequest;
use App\Services\Admin\RoleServices;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $roleService;
    public function __construct() {

        $this->roleService = new RoleServices();

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

        $res = $this->roleService->list(json_decode(json_encode($params)));

        return $res;
    }

    public function store(StoreRequest $request)
    {
        $res = $this->roleService->store($request);

        return $res;
    }

}
