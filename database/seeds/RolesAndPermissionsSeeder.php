<?php

use App\Models\Role;
use App\Models\Permission;
use App\Teams\Roles as TeamRoles;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = TeamRoles::$roles;

        foreach ($roles as $role => $data) {
            $role = Role::firstOrCreate(['name' => $role]);

            foreach ($data['permissions'] as $permission) {
                Permission::firstOrCreate(['name' => $permission]);

                $role->attachPermission($permission);
            }
        }
    }
}
