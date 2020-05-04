<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->name = 'admin';
        $role->guard_name = 'web';
        $role->save();

        $permissions = Permission::get();

        if ($permissions !== null) {
        	# code...
        	foreach ($permissions as $perm) {
        		# code...
        		$role->givePermissionTo($perm);
        	}
        }


    }
}
