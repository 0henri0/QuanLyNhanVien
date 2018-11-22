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

//Route::get('/', function () {
//    return view('home');
//});
//Route::get('/admin', function () {
//    return view('admin.home');
//});
//Route::get('/admin/staffs', function () {
//    return view('admin.staff');
//});


Route::resource('timesheets', 'Staff\TimesheetController');
Route::resource('tasks', 'Staff\TaskController');

Route::post('staffs/{id}', 'Admin\StaffController@update');

Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
    Route::resource('staffs', 'Admin\StaffController');
    Route::get('staffs/delete/{id}', 'Admin\StaffController@destroy');
    Route::get('system', 'Admin\SystemmanagerController@index');
    Route::post('system', 'Admin\SystemmanagerController@update');
});

 Auth::routes();

 Route::get('/home', 'HomeController@index')->name('home');
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
