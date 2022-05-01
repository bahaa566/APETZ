<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [

            [
                'name' => 'roles-list',
                'guard_name' => 'web',
                'title' => 'قائمة الصلاحيات',
            ],
            [
                'name' => 'roles-create',
                'guard_name' => 'web',
                'title' => 'اضافة صلاحية',
            ],
            [
                'name' => 'roles-edit',
                'guard_name' => 'web',
                'title' => 'تعديل صلاحية',
            ],
            [
                'name' => 'roles-delete',
                'guard_name' => 'web',
                'title' => 'حذف صلاحية',
            ],
            [
                'name' => 'admins-list',
                'guard_name' => 'web',
                'title' => 'قائمة اعضاء الإدارة',
            ],
            [
                'name' => 'admins-create',
                'guard_name' => 'web',
                'title' => 'اضافة اعضاء الإدارة',
            ],
            [
                'name' => 'admins-edit',
                'guard_name' => 'web',
                'title' => 'تعديل اعضاء الإدارة',
            ],
            [
                'name' => 'admins-delete',
                'guard_name' => 'web',
                'title' => 'حذف اعضاء الإدارة',
            ],
            [
                'name' => 'users-list',
                'guard_name' => 'web',
                'title' => 'قائمة المستخدمين',
            ],
            [
                'name' => 'users-create',
                'guard_name' => 'web',
                'title' => 'اضافة المستخدمين',
            ],
            [
                'name' => 'users-edit',
                'guard_name' => 'web',
                'title' => 'تعديل المستخدمين',
            ],
            [
                'name' => 'users-delete',
                'guard_name' => 'web',
                'title' => 'حذف المستخدمين',
            ],
            [
                'name' => 'captains-list',
                'guard_name' => 'web',
                'title' => 'قائمة المناديب',
            ],
            [
                'name' => 'captains-create',
                'guard_name' => 'web',
                'title' => 'اضافة مناديب جديدة',
            ],
            [
                'name' => 'captains-edit',
                'guard_name' => 'web',
                'title' => 'تعديل المناديب',
            ],
            [
                'name' => 'captains-delete',
                'guard_name' => 'web',
                'title' => 'حذف المناديب',
            ],

            [
                'name' => 'countries-list',
                'guard_name' => 'web',
                'title' => 'قائمة الدول',
            ],
            [
                'name' => 'countries-create',
                'guard_name' => 'web',
                'title' => 'اضافة دول جديدة',
            ],
            [
                'name' => 'countries-edit',
                'guard_name' => 'web',
                'title' => 'تعديل الدول',
            ],
            [
                'name' => 'countries-delete',
                'guard_name' => 'web',
                'title' => 'حذف الدول',
            ],

            [
                'name' => 'cities-list',
                'guard_name' => 'web',
                'title' => 'قائمة المدن',
            ],
            [
                'name' => 'cities-create',
                'guard_name' => 'web',
                'title' => 'اضافة مدن جديدة',
            ],
            [
                'name' => 'cities-edit',
                'guard_name' => 'web',
                'title' => 'تعديل المدن',
            ],
            [
                'name' => 'cities-delete',
                'guard_name' => 'web',
                'title' => 'حذف المدن',
            ],

            [
                'name' => 'advertisements-list',
                'guard_name' => 'web',
                'title' => 'قائمة الإعلانات',
            ],
            [
                'name' => 'advertisements-create',
                'guard_name' => 'web',
                'title' => 'اضافة إعلانات جديدة',
            ],
            [
                'name' => 'advertisements-edit',
                'guard_name' => 'web',
                'title' => 'تعديل الإعلانات',
            ],
            [
                'name' => 'advertisements-delete',
                'guard_name' => 'web',
                'title' => 'حذف الإعلانات',
            ],

            [
                'name' => 'settings-list',
                'guard_name' => 'web',
                'title' => 'قائمة الإعدادات',
            ],
            [
                'name' => 'settings-edit',
                'guard_name' => 'web',
                'title' => 'تعديل الإعدادات',
            ],
            [
                'name' => 'notifications-create',
                'guard_name' => 'web',
                'title' => 'إرسال إشعارات',
            ],


        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
