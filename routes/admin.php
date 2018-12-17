<?php
Route::resource('staffs', 'Admin\StaffController');
Route::get('staffs/delete/{staff}', 'Admin\StaffController@destroy');
Route::get('system', 'Admin\SystemmanagerController@index');
Route::post('system', 'Admin\SystemmanagerController@update');