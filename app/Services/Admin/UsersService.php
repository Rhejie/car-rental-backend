<?php

namespace App\Services\Admin;

use App\Models\User;

class UsersService {

    private $roleService;

    public function __construct() {

        $this->roleService = new RoleServices();
    }
    public function list($params) {

        $users = User::with(['userIdentifications']);

        if($params->search) {

            $users = $users->where(function($query) use ($params) {
                $query->orWhere('first_name', 'LIKE', "%$params->search%");
                $query->orWhere('last_name', 'LIKE', "%$params->search%");
                $query->orWhere('middle_name', 'LIKE', "%$params->search%");
            });

        }

        $role = $this->roleService->getAdminRole();

        if ($role) {
            $users = $users->where('role_id', '!=', $role->id);
        }

        $users = $users->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($users, 200);
    }

    public function uploadProfile($request) {

        if ($request->hasFile('file')) {

            $folder = "/user/profile";
            $media = $request->file('file');
            $name = time() . '.' . $media->extension();
            // $link = $media->storeAs($folder, $name, 'public');

            $file = $request->file('file');
            $file->move(public_path('uploads'), $name);

            $link = '/uploads/' . $name;

            return response()->json($link);
        }

        return response()->json(['message' => "No file found"]);
    }

    public function updateAdmin($request) {
        $model = User::find($request->id);
        $model->last_name = $request->last_name;
        $model->first_name = $request->first_name;
        $model->contact_number = $request->contact_number;

        if(isset($request->change_password) && $request->change_password) {
            $model->password = bcrypt($request->new_password);
        }

        $model->save();

        return response()->json($model);
    }
}
