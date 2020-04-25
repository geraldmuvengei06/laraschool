<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/{path}', "WelcomeController@index")
    ->name('welcome')
    ->where('path', "|login|register|forgot-password");

Route::get('/{any}', 'HomeController@index')
    ->name('home')
    ->where('any', "home.*");

Route::get('/admin', "AdminController@index")->name('admin');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    
    Route::apiResource('settings', "API\SettingsController");

    // users
    Route::apiResource('users', "API\UserController");
    Route::put('users/update-profile/{user}', "API\UserController@updateProfile")->name('users.update-profile');

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
