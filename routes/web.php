<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    $adminData = DB::table('users')->get();
    return view('auth.login')->with('adminData' , $adminData);

});

Auth::routes();
//++++++++++++++++++++++ For Login ++++++++++++++++++++++++
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/loginadmin', 'App\Http\Controllers\AdminController@Login')->name('loginadmin');
// Route::get('/adminShow', 'App\Http\Controllers\AdminController@adminShows')->name('adminShow');
Route::get('/adminShow', 'App\Http\Controllers\HomeController@adminShows')->name('adminShow');
Route::post('product/create',['uses'=>'Auth\LoginController@adminShows']);

// +++++++++++++++++ Add Admin ++++++++++++++++++
Route::get('subadmin', 'App\Http\Controllers\AdminController@subAdmin')->name('subadmin');
Route::post('updateAdmin', 'App\Http\Controllers\AdminController@updateAdmin')->name('updateAdmin');


// +++++++++++++++++ Add SubAdmin ++++++++++++++++++
Route::get('saveUserData', 'App\Http\Controllers\AdminController@saveUserData')->name('saveUserData');
Route::get('/usersupdate',  'App\Http\Controllers\AdminController@adminUpdate')->name('usersupdate');
// Route::get('/projects/display', 'AdminController@adminUpdate');




