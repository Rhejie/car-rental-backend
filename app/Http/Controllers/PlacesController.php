<?php

namespace App\Http\Controllers;

use App\Http\Requests\Places\StoreRequest;
use App\Services\Admin\PlacesService;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    private $placesService ;
    public function __construct() {
        $this->placesService = new PlacesService();
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
        return $this->placesService->list(json_decode(json_encode($params)));
    }

    public function store(StoreRequest $request) {

        return $this->placesService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->placesService->update($request, $id);

    }

    public function trash($id) {

        return $this->placesService->trash($id);

    }

    public function forceDelete($id){
        return $this->placesService->forceDelete($id);
    }

    public function restore($id) {

        return $this->placesService->restore($id);
    }

    public function selectPlaces(Request $request)
    {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $params = [
            'search' => $search
        ];
        return $this->placesService->selectPlace(json_decode(json_encode($params)));
    }
}
