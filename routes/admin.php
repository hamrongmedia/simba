<?php
Route::prefix('hrm')->namespace('Admin')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.index');

    // Posts
    Route::get('/posts', 'PostsController@index')->name('admin.posts.index');
    Route::get('/posts/create', 'PostsController@create')->name('admin.posts.create');
    Route::post('/posts/create', 'PostsController@store')->name('admin.posts.store');

    // Category
    Route::get('/category', 'PostsController@index')->name('admin.category.index');
    Route::get('/category/create', 'PostsController@create')->name('admin.category.create');
    Route::post('/category/create', 'PostsController@store')->name('admin.category.store');

    // Admin manage routes
    Route::get('/user', 'UserManageController@index')->name('admin.user.index');
    Route::get('create', 'Auth\UsersController@create')->name('admin.user.create');
    Route::post('/create', 'Auth\UsersController@postCreate')->name('admin.user.create');
    Route::get('/edit/{id}', 'Auth\UsersController@edit')->name('admin.user.edit');
    Route::post('/edit/{id}', 'Auth\UsersController@postEdit')->name('admin.user.edit');
    Route::post('/delete', 'Auth\UsersController@deleteList')->name('admin.user.delete');

});

Route::prefix('hrm')->namespace('auth')->group(function () {
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'AdminLoginController@adminLogout')->name('admin.logout');

});