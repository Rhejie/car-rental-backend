<?php

namespace App\Services\Admin;

use App\Models\User;
use Carbon\Carbon;

class UserServices {

    private $roleServices;
    public function __construct() {
        $this->roleServices = new RoleServices();
    }

    public function createAdminAccount() {
        $model = new User();
        $model->first_name = 'Admin';
        $model->last_name = 'Admin';
        $model->middle_name = 'Admin';
        $model->birthday = Carbon::now();
        $model->email = 'admin@gmail.com';
        $model->address = 'admin address';
        $model->contact_number = '09090909090';
        $model->email_verified_at = Carbon::now();
        $model->password = bcrypt('admin123');
        $model->role_id = ($this->roleServices->getAdminRole())->id;
        $model->save();
    }
}
