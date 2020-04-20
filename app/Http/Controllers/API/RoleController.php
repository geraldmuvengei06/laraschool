<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::with('permissions')->get();
        $permissions = Permission::get();

        return response()->json([
            'roles' => $roles,
            'permissions' => $permissions,
        ], 200);
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['name' => 'required|unique:roles|string|max:50']);

        $role = Role::create([
            'name' => $request->name,
        ]);

        return response()->json('Success.. Role created!', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = Role::findOrFail($id);

        # code...
        return response()->json($role, 200);
        
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role = Role::findOrFail($id);

        $this->validate($request, ['name' => 'required|string|max:50|unique:roles,name,'.$role->id]);

        $role->name = $request->name;
        
        $role->save();

        return response()->json("Success.. Role updated!", 200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = Role::findOrFail($id);

        $role->delete();

        return response()->json('Success.. Role deleted!', 200);
    }

    public function assignRoleToUser(Request $request)
    {
        # code...
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role_id);

        $user->assignRole($role);

        return response()->json('Success.. Role assigned!', 200);
    }

    public function revokeRoleFromUser(Request $request)
    {
        # code...
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role_id);

        $user->removeRole($role);

        return response()->json('Success.. Role revoked!', 200);

    }

   
}
