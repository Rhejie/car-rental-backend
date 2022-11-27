<?php

namespace App\Http\Controllers;

use App\Http\Requests\Color\StoreRequest;
use App\Services\Admin\ColorService;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $colorService ;
    public function __construct() {
        $this->colorService = new ColorService();
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
        return $this->colorService->list(json_decode(json_encode($params)));
    }

    public function store(StoreRequest $request) {

        return $this->colorService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->colorService->update($request, $id);

    }

    public function trash($id) {

        return $this->colorService->trash($id);

    }

    public function forceDelete($id){
        return $this->colorService->forceDelete($id);
    }

    public function restore($id) {

        return $this->colorService->restore($id);
    }

    public function selectColor()
    {
        return $this->colorService->selectColor();
    }
}
