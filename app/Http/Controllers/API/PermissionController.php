<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Model\Role;
use Spatie\Permission\Model\Permission;


class PermissionController extends Controller
{
    //
    public function index()
    {
        # code...
    }

    public function store(Request $request)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }

    public function assignPermissionToUser(Request $request)
    {
        # code...

    }

    public function revokePermissionFromUser(Request $request)
    {
        # code...
    }

    public function assignPermissionToRole(Request $request)
    {
        # code...

    }

    public function revokePermissionFromRole(Request $request)
    {
        # code...
    }

    public function assignAllPermissions(Request $request)
    {
        # code...

    }

    public function revokeAllPermissions(Request $request)
    {
        # code...
    }
}
