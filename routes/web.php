<?php

Route::group(['middleware' => ['auth']], function () {
    Route::post('staffs/{id}', 'Admin\StaffController@update');
    Route::get('/statistics', 'Staff\WorkManagerController@index');
    Route::get('leader', 'Staff\LeaderController@index');
    Route::get('leader/{id}', 'Staff\LeaderController@update')->middleware('checkLeader');

    Route::resource('timesheets', 'Staff\TimesheetController')->except('show');

    Route::get('timesheets/{timesheetId}/tasks', 'Staff\TaskController@index');
    Route::post('timesheets/{timesheetId}/tasks', 'Staff\TaskController@store');
    Route::post('tasks/{taskId}', 'Staff\TaskController@update');
});


//-----------------------------------------
//done
Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware' => ['checkAdmin']], function () {
    Route::resource('staffs', 'Admin\StaffController');
    Route::get('staffs/delete/{id}', 'Admin\StaffController@destroy');
    Route::get('system', 'Admin\SystemmanagerController@index');
    Route::post('system', 'Admin\SystemmanagerController@update');
});
//---------------------------------------------
//done
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admin\Auth\LoginAdminController@showLoginForm');
    Route::post('login', 'Admin\Auth\LoginAdminController@login')->name('admin-login');
    Route::post('logout', 'Admin\Auth\LoginAdminController@logout')->name('admin-logout');
});

//---------------------------------------------
//done
Route::get('login', 'Staff\LoginStaffController@showLoginForm');
Route::post('login', 'Staff\LoginStaffController@login')->name('login');
Route::post('logout', 'Staff\LoginStaffController@logout')->name('logout');


