<?php

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

Route::get('/admin',function (){
    return redirect('admin/staffs');
});
