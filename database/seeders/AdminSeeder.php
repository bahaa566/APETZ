<?php

namespace Database\Seeders;

use App\Models\Admin;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'phone' => '123456789',
                'active' => 1,
                'password' => 123456
            ]
        );

        $role = Role::updateOrCreate(['name' => 'super admin', 'guard_name' => 'web']);

        $permissions = Permission::get(['id']);
        $role->permissions()->sync($permissions);

        //        $role->syncPermissions($permissions);

        $admin->assignRole($role);
    }
}
