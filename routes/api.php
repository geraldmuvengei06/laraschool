<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
    
    Route::apiResource('settings', "API\SettingsController");

    // roles
    Route::apiResource('roles', "API\RoleController");
    Route::post('assign-role-to-user', "API\RoleController@assignRoleToUser")->name('roles.assignRoleToUser');
    Route::post('revoke-role-from-user', "API\RoleController@revokeRoleFromUser")->name('roles.revokeRoleFromUser');

    // permissions
    Route::apiResource('permissions', "API\PermissionController");
    Route::post('assign-permission-to-user', "API\PermissionController@assignPermissionToUser")->name('permissions.assignPermissionToUser');
    Route::post('revoke-permission-from-user', "API\PermissionController@revokePermissionFromUser")->name('permissions.revokePermissionFromUser');
    Route::post('assign-permission-to-role', "API\PermissionController@assignPermissionToRole")->name('permissions.assignPermissionToRole');
    Route::post('revoke-permission-from-role', "API\PermissionController@revokePermissionFromRole")->name('permissions.revokePermissionFromRole');
    Route::post('assign-all-permissions', "API\PermissionController@assignAllPermissions")->name('permissions.assignAllPermissions');
    Route::post('revoke-all-permissions', "API\PermissionController@revokeAllPermissions")->name('permissions.revokeAllPermissions');


});

