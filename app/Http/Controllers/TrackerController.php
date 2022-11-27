<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tracker\StoreRequest;
use App\Services\Admin\TrackerService;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    private $trackerService;

    public function __construct() {
        $this->trackerService = new TrackerService();
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
        return $this->trackerService->list(json_decode(json_encode($params)));
    }

    public function tracker($id) {

        return response()->json($this->trackerService->getTrackerById($id));

    }

    public function selectTrackers(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;

        $params = [
            'search' => $search
        ];

        return $this->trackerService->selectTrackers(json_decode(json_encode($params)));

    }

    public function store(StoreRequest $request) {

        return $this->trackerService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->trackerService->update($request, $id);

    }

    public function trash($id) {

        return $this->trackerService->trash($id);

    }

    public function forceDelete($id){

        return $this->trackerService->forceDelete($id);

    }

    public function restore($id) {

        return $this->trackerService->restore($id);
    }
}
