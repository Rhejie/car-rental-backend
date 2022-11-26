<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;
    public function __construct() {
        $this->authService = new AuthService();
    }
    public function login(LoginRequest $request)
    {
        $login = $this->authService->login($request);

        return $login;
    }
}
