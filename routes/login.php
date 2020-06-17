<?php
Route::group(['middleware' => 'auth:admin', 'prefix' => 'hrm/user', 'namespace' => 'Admin'], function () {
    // Admin manage routes
    Route::get('/', 'UserManageController@index')->name('admin.user.index');
    Route::get('/create', 'UserManageController@create')->name('admin.user.create');
    Route::post('/create', 'UserManageController@store')->name('admin.user.store');
    Route::get('/edit/{id}', 'UserManageController@edit')->name('admin.user.edit');
    Route::post('/edit/{id}', 'UserManageController@edit')->name('admin.user.update');
    Route::post('/delete', 'UserManageController@delete')->name('admin.user.delete');

});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'hrm/role', 'namespace' => 'Admin'], function () {
    // Admin manage routes
    Route::get('/', 'RoleController@index')->name('admin.role.index');
    Route::get('/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/create', 'RoleController@store')->name('admin.role.store');
    Route::get('/edit/{id}', 'RoleController@edit')->name('admin.role.edit');
    Route::post('/edit/{id}', 'RoleController@update')->name('admin.role.update');
    Route::post('/delete', 'RoleController@delete')->name('admin.role.delete');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'hrm/permission', 'namespace' => 'Admin'], function () {
    // Admin manage routes
    Route::get('/', 'PermissionController@index')->name('admin.permission.index');
    Route::get('/create', 'PermissionController@create')->name('admin.permission.create');
    Route::post('/create', 'PermissionController@store')->name('admin.permission.store');
    Route::get('/edit/{id}', 'PermissionController@edit')->name('admin.permission.edit');
    Route::post('/edit/{id}', 'PermissionController@update')->name('admin.permission.update');
    Route::post('/delete', 'PermissionController@delete')->name('admin.permission.delete');

});

Route::prefix('hrm')->namespace('Auth')->group(function () {
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AdminLoginController@adminLogout')->name('admin.logout');
});