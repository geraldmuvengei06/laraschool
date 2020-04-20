<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Auth;



class UserController extends Controller
{
    public function _construct()
    {

        
        // $this->middleware('permission:create-user', ['only' => ['store']]);
        // $this->middleware('permission:update-user', ['only' => ['update']]);
        // $this->middleware('permission:delete-user', ['only' => ['destroy']]);

    }
    public function index()
    {
        $users = User::with('permissions')->get();
        $roles = Role::get();
        $permissions = Permission::get();

        return response()->json([
            'users' => $users,
            'roles' => $roles,
            'permissions' => $permissions,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        // abort_unless(\Gate::allows('update-user'), 403);
        // if (\Gate::allows('update-user')) {
            # code...
            $user = User::findOrFail($id);
            if ($user != null) {
    
                $request->validate([
                    'first'  => 'required|string|max:255',
                    'last'  => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
                    'phone' => 'required|numeric|unique:users,phone,'.$request->id
                ]);
        
                $user->first = $request->first;
                $user->last = $request->last;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->save();
    
                return response()->json('Success.. User updated!', 200);
            }
        // } else{
        //     abort(403);
        // }
    }

    public function updateProfile(Request $request, $id)
    {
        # code...
        $user = User::findOrFail($id);
        if ($user != null) {

            $request->validate([
                'initials'  => 'required|string|max:10',
                'first'  => 'required|string|max:255',
                'last'  => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
                'phone' => 'required|numeric|unique:users,phone,'.$request->id,
                'id_number' => 'required|numeric|unique:users,id_number,'.$request->id,
                'profession'  => 'required|string|max:255',
                'address'  => 'required|string|max:255',

            ]);
    
            $user->initials = $request->initials;
            $user->first = $request->first;
            $user->last = $request->last;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->id_number = $request->id_number;
            $user->profession = $request->profession;
            $user->address = $request->address;
            $user->save();

            return response()->json('Success.. Profile updated!', 200);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        if (Auth::user()->id === $user->id) {
            # code...
            return response()->json('Error.. User not deleted', 401);

        }
        $user->delete();

        return response()->json('Success.. User deleted', 200);
    }
}