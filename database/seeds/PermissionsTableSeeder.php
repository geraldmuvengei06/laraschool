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
            $permission = Permission::where('name', $perm)->first();
            if ($permission == null) {
                # code...
                Permission::create([
                    'name' => $perm
                ]);
            }
        }

        $user = \App\User::where('email', 'admin@laraschool.com')->first();

        if ($user != null) {
            # code...
            foreach ($permissions as $perm) {
                # code...
                $user->givePermissionTo($perm);
            }
        } 
        
    }
}
