<?php
Route::prefix('hrm')->namespace('Admin')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.index');

    // Posts
    Route::get('/posts', 'PostsController@index')->name('admin.post.index');
    Route::get('/post/create', 'PostsController@create')->name('admin.post.create');
    Route::post('/post/create', 'PostsController@store')->name('admin.post.store');
    Route::get('/post/edit/{id}','PostsController@edit')->name('admin.post.edit');
    Route::post('/post/edit/{id}','PostsController@update')->name('admin.post.update');
    Route::get('/post/destroy/{id}','PostsController@destroy')->name('admin.post.destroy');

    // Category
    Route::get('/category','CategoryController@index')->name('admin.category.index');
    Route::get('/category/create','CategoryController@create')->name('admin.category.create');
    Route::post('/category/create','CategoryController@store')->name('admin.category.store');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('admin.category.edit');
    Route::post('/category/edit/{id}','CategoryController@update')->name('admin.category.update');
    Route::get('/category/destroy/{id}','CategoryController@destroy')->name('admin.category.destroy');

});