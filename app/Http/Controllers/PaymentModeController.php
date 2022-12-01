<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMode\StoreRequest;
use App\Services\Admin\PaymentModeService;
use Illuminate\Http\Request;

class PaymentModeController extends Controller
{
    private $paymentModeService;

    public function __construct() {
        $this->paymentModeService = new PaymentModeService();
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
        return $this->paymentModeService->list(json_decode(json_encode($params)));
    }

    public function store(StoreRequest $request) {

        return $this->paymentModeService->store($request);

    }

    public function update(StoreRequest $request, $id) {

        return $this->paymentModeService->update($request, $id);

    }

    public function trash($id) {

        return $this->paymentModeService->trash($id);

    }

    public function forceDelete($id){
        return $this->paymentModeService->forceDelete($id);
    }

    public function restore($id) {

        return $this->paymentModeService->restore($id);
    }

    public function selectPaymentMethod(Request $request) {
        $search = $request->search ? $request->search : null;

        $params = [
            'search' => $search
        ];

        return $this->paymentModeService->selectPaymentMethod(json_decode(json_encode($params)));
    }
}
