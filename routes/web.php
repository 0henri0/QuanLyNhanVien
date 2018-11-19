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
Route::resource('timesheets', 'Staff\TimesheetController');
Route::resource('tasks', 'Staff\TaskController');

Route::get('admin/staffs/{staff}', 'Admin\StaffController@show');
Route::post('staffs/{id}', 'Admin\StaffController@update');
Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
    Route::resource('staffs', 'Admin\StaffController')->except(['show']);
    Route::resource('system', 'Admin\SystemmanagerController')->only(['index','edit','update']);
});
