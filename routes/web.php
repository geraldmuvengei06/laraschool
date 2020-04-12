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
    ->where('path', "|login");

Route::get('/{any}', 'HomeController@index')
    ->name('home')
    ->where('any', "home.*");

Route::get('/admin', "AdminController@index")->name('admin');

Auth::routes();
