<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use App\Services\Auth\AuthService;
use Carbon\Carbon;
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

        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout Successfully',
            'status_code' => 200,
        ], 200);

    }

    public function getUserProfile($id) {
        return response()->json(User::with(['userIdentifications'])->find($id));
    }

    public function verifiedUser($id) {

        $user = User::with(['userIdentifications'])->find($id);
        $user->admin_verified_at = Carbon::now();
        $user->save();

        return response()->json($user);
    }

    public function blockUser($id) {
        $user = User::find($id);
        $user->is_block = $user->is_block == true ? false : true;
        $user->save();

        return response()->json($user);
    }

    public function updateProfile($id, UpdateUserProfileRequest $request) {

        $model = User::find($id);
        $model->first_name = $request->first_name;
        $model->last_name = $request->last_name;
        $model->birthday = $request->birthday;
        $model->email = $request->email;
        $model->gender = $request->gender;
        $model->contact_number = $request->contact_number;
        $model->address = $request->address;

        if(isset($request->change_password) && $request->change_password) {
            $model->password = bcrypt($request->new_password);
        }

        $model->save();

        $newUser = User::with('userIdentifications')->find($model->id);
        return response()->json($newUser);
    }
}
