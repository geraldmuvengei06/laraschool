<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionController extends Controller
{
    //
    public function index()
    {
        # code...
        $permissions = Permission::latest()->get();

        return response()->json($permissions, 200);

    }

    public function store(Request $request)
    {
        # code...
        $this->validate($request, [
            'name' => 'required|string|max:50'
        ]);
        $permission = Permission::create([
            'name' => $request->name,
        ]);

        return response()->json('Success.. Permission created!', 200);
    }

    public function destroy($id)
    {
        # code...
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return response()->json('Success.. Permission deleted', 200);
    }

    public function assignPermissionToUser(Request $request)
    {
        # code...
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'permission_id' => 'required|numeric',
        ]);
        
        $user = User::findOrFail($request->user_id);
        $permission = Permission::findOrFail($request->permission_id);

        $user->givePermissionTo($permission);

        return response()->json('Success.. Permission assigned to user!', 200);
        

    }

    public function revokePermissionFromUser(Request $request)
    {
        # code...
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'permission_id' => 'required|numeric',
        ]);
        
        $user = User::findOrFail($request->user_id);
        $permission = Permission::findOrFail($request->permission_id);

        $user->revokePermissionTo($permission);

        return response()->json('Success.. Permission revoked from user!', 200);
        
    }

    public function assignPermissionToRole(Request $request)
    {
        # code...
        $this->validate($request, [
            'role_id' => 'required|numeric',
            'permission_id' => 'required|numeric',
        ]);
        
        $role = Role::findOrFail($request->role_id);
        $permission = Permission::findOrFail($request->permission_id);

        $role->givePermissionTo($permission);

        return response()->json('Success.. Permission assigned to role!', 200);
    }

    public function revokePermissionFromRole(Request $request)
    {
        # code...
        $this->validate($request, [
            'role_id' => 'required|numeric',
            'permission_id' => 'required|numeric',
        ]);
        
        $role = Role::findOrFail($request->role_id);
        $permission = Permission::findOrFail($request->permission_id);

        $role->revokePermissionTo($permission);

        return response()->json('Success.. Permission revoked from role!', 200);
    }

    public function assignAllPermissions(Request $request)
    {
        # code...
        $this->validate($request, [
            'role_id' => 'required|numeric',
        ]);

        $role = Role::findOrFail($request->role_id);

        $permissions = Permission::all();

        $role->givePermissionTo($permissions);

        return response()->json('Success.. All permissions assigned to role!', 200);
        
    }

    public function revokeAllPermissions(Request $request)
    {
        # code...
        $this->validate($request, [
            'role_id' => 'required|numeric',
        ]);

        $role = Role::findOrFail($request->role_id);

        $role->syncPermissions();

        return response()->json('Success.. All permissions revoked from role!', 200);
    }
}
