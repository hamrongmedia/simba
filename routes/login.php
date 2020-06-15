<?php
Route::group(['prefix' => 'hrm/user', 'namespace' => 'Admin'], function () {
    // Admin manage routes
    Route::get('/', 'UserManageController@index')->name('admin.user.index');
    Route::get('/create', 'UserManageController@create')->name('admin.user.create');
    Route::post('/create', 'UserManageController@store')->name('admin.user.store');
    Route::get('/edit/{id}', 'UserManageController@edit')->name('admin.user.edit');
    Route::post('/edit/{id}', 'UserManageController@edit')->name('admin.user.edit');
    Route::post('/delete', 'UserManageController@delete')->name('admin.user.delete');

});

Route::prefix('hrm')->namespace('Auth')->group(function () {
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AdminLoginController@adminLogout')->name('admin.logout');
});