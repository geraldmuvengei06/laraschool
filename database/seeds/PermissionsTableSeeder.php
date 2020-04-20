<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [

            'create-user',
            'update-user',
            'delete-user',
            
            'create-role',
            'update-role',
            'delete-role',

            'assign-roles',
            'revoke-roles',

            'assign-permissions',
            'revole-permissions',
        ];

        foreach ($permissions as $perm ) {
            # code...
            $permission = Permission::findByName($perm);
            if ($permission == null) {
                # code...
                Permission::create([
                    'name' => $perm
                ]);
            }
        }
    }
}
