<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ProfileRequest;
use App\Services\Admin\UsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $usersService;
    public function __construct() {

        $this->usersService = new UsersService();

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

        return $this->usersService->list(json_decode(json_encode($params)));
    }

    public function uploadProfile(ProfileRequest $request) {

        return $this->usersService->uploadProfile($request);
    }
}
