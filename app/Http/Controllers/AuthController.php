<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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

    public function register(RegisterRequest $request) {

        $register = $this->authService->register($request);

        return $register;
    }

    public function logout(Request $request) {

        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Logout Successfully',
            'status_code' => 200,
        ], 200);

    }
}
