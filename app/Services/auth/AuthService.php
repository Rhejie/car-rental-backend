<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService {

    public function login ($request) {

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'message' => 'Invalid Email/Password',
                'status_code' => 401,
            ], 401);
        }

        $user = $request->user();

        $userData = User::with(['role'])->find($user->id);

        if ($userData) {
            return response()->json([
                'user' => $userData,
                "token" => $userData->createToken('myAppToken')->plainTextToken,
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Some error occurred',
                'status_code' => 500,
            ], 500);
        }
    }

    public function getUserProfile () {
        return response()->json(auth('sanctum')->user());
    }
}
