<?php

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
    return view('welcome');
});


Route::group(['middleware' => ['web']], function(){

	Route::resource('/absen', 'AbsenController');

	Route::resource('/izin', 'IzinController');

	Route::resource('/admin/daftar-staff', 'StaffController');

	Route::resource('/admin/daftar-kehadiran', 'AdminController');

	Route::resource('/admin/manage-admin', 'ManageController');

	Route::get('/admin/resetrecord','AdminController@resetrecord');

	Route::get('/admin/adminexcel', 'AdminController@excel');

	Route::get('/admin/adminpdf', 'AdminController@pdf');

	Route::get('/admin/resethadir', 'AdminController@editall');

	Route::resource('/admin', 'DashboardController');

});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');