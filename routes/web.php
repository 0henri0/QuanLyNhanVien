<?php

Route::group(['middleware' => ['auth']], function () {
    Route::post('staffs/{id}', 'Admin\StaffController@update');
    Route::get('/statistics', 'Staff\WorkManagerController@index');
    Route::get('leader', 'Staff\LeaderController@index');
    Route::get('leader/{id}', 'Staff\LeaderController@update')->middleware('checkLeader');

    Route::resource('timesheets', 'Staff\TimesheetController')->except('show');

    Route::get('timesheets/{id}/tasks', 'Staff\TaskController@index')->middleware('checkLeader');
    Route::post('timesheets/{id}/tasks', 'Staff\TaskController@store')->middleware('checkLeader','checkOriginStaff');
    Route::post('tasks/{taskId}', 'Staff\TaskController@update');
    Route::get('profile','Staff\ProfileController@show');
    Route::post('profile','Staff\ProfileController@update')->name('profile');
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
Route::get('logout', 'Staff\LoginStaffController@logout')->name('logout');

Route::get('/',function (){
   return redirect('timesheets');
});
