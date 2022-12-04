<?php

namespace App\Http\Controllers;

use App\Http\Requests\Form\StoreRequest;
use App\Services\Admin\FormService;
use Illuminate\Http\Request;

class FormController extends Controller
{
    private $formService;

    public function __construct()
    {

        $this->formService = new FormService();
    }

    public function list(Request $request)
    {
        $search = $request->search && $request->search != '' && $request->search !== 'null' ? $request->search : null;
        $page = $request->page ? $request->page : 1;
        $count = $request->size ? $request->size : 10;

        $params = [
            'search' => $search,
            'page' => $page,
            'count' => $count
        ];
        return $this->formService->list(json_decode(json_encode($params)));
    }

    public function selectForm()
    {

        return $this->formService->selectForm();
    }

    public function store(StoreRequest $request)
    {

        return $this->formService->store($request);
    }

    public function update(StoreRequest $request, $id)
    {

        return $this->formService->update($request, $id);
    }

    public function trash($id)
    {

        return $this->formService->trash($id);
    }

    public function forceDelete($id)
    {

        return $this->formService->forceDelete($id);
    }

    public function restore($id)
    {

        return $this->formService->restore($id);
    }
}
