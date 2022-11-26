<?php

namespace Database\Seeders;

use App\Services\Admin\RoleServices;
use App\Services\Admin\UserServices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = new RoleServices();
        $roles->createRoles();
        $userService = new UserServices();
        $userService->createAdminAccount();
    }
}
