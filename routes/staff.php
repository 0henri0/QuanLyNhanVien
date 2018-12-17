<?php
Route::get('/statistics', 'Staff\WorkManagerController@index');
Route::get('leader', 'Staff\LeaderController@index');
Route::get('leader/{id}', 'Staff\LeaderController@update')->middleware('checkLeader');

Route::resource('timesheets', 'Staff\TimesheetController')->except('show');

Route::get('timesheets/{timesheet}/tasks', 'Staff\TaskController@index')->middleware('checkLeader');
Route::post('timesheets/{timesheet}/tasks', 'Staff\TaskController@store')->middleware('checkLeader','checkOriginStaff');
Route::post('tasks/{task}', 'Staff\TaskController@update');
Route::get('tasks/delete/{task}', 'Staff\TaskController@destroy')->middleware('checkOriginStaff');;
Route::get('profile','Staff\ProfileController@show');
Route::post('profile','Staff\ProfileController@update')->name('profile');