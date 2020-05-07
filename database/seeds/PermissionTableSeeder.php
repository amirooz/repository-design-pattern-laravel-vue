<?php


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
       $permissions = [
           'permission-list',
           'permission-create',
           'permission-edit',
           'permission-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'division-list',
           'division-create',
           'division-edit',
           'division-delete',
           'mahanagar-list',
           'mahanagar-create',
           'mahanagar-edit',
           'mahanagar-delete',
           'thana-list',
           'thana-create',
           'thana-edit',
           'thana-delete',
           'district-list',
           'district-create',
           'district-edit',
           'district-delete',
           'upazilla-list',
           'upazilla-create',
           'upazilla-edit',
           'upazilla-delete',
           'pourashava-list',
           'pourashava-create',
           'pourashava-edit',
           'pourashava-delete',
           'union-list',
           'union-create',
           'union-edit',
           'union-delete',
           'member-list',
           'member-create',
           'member-edit',
           'member-delete',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
