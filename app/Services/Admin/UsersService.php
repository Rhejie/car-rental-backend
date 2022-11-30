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
}
