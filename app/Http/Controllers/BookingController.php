<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\DeployRequest;
use App\Http\Requests\Booking\ReturnedRequest;
use App\Http\Requests\Booking\StoreRequest;
use App\Services\Admin\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private $bookingService;

    public function __construct(BookingService $bookingService) {
        $this->bookingService = $bookingService;
    }

    public function list(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];

        return $this->bookingService->list(json_decode(json_encode($params)));
    }

    public function deployedList(Request $request) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];

        return $this->bookingService->deployedList(json_decode(json_encode($params)));
    }

    public function history(Request $request, $vehicle_id) {

        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search: null ;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];

        return $this->bookingService->list(json_decode(json_encode($params)), $vehicle_id);
    }

    public function store(StoreRequest $request) {

        return $this->bookingService->store($request);
    }

    public function accept(Request $request) {

        return $this->bookingService->accept(json_decode(json_encode($request->all())));

    }

    public function deploy($id, DeployRequest $request) {
        return $this->bookingService->deploy($id, $request);
    }

    public function returned($id, ReturnedRequest $request) {

        return $this->bookingService->returned($id, $request);
    }

    public function getCurrentBookUser() {

        return $this->bookingService->getUserLatestBook();

    }
}
