<?php

namespace App\Services\Admin;

use App\Models\Role;

class RoleServices {

    public function list($params) {

        $roles = Role::query();

        if($params->search) {

            $roles = $roles->where(function($query) use ($params) {
                $query->orWhere('name', 'LIKE', "%$params->search%");
            })->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

            return $roles;

        }

        $roles = $roles->orderBy('id', 'desc')->paginate($params->count, ['*'], 'page', $params->page);

        return response()->json($roles, 200);

    }


    public function store($request)
    {
        $model = new Role();
        $model->name = $request->name;
        $model->save();
        return $model;
    }

    public function createRoles() {

        $roles = [
            ['name' => 'admin'],
            ['name' => 'user']
        ];

        foreach ($roles as $role) {
            $model = Role::create($role);
        }
    }

    public function getAdminRole() {
        $role = Role::where('name', 'admin')->first();
        return $role;
    }
}
