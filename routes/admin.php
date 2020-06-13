<?php
Route::prefix('hrm')->namespace('Admin')->group( function () {
    Route::get('/','AdminController@index')->name('admin.index');

    // Posts
    Route::get('/posts','PostsController@index')->name('admin.posts.index');
    Route::get('/posts/create','PostsController@create')->name('admin.posts.create');
    Route::post('/posts/create','PostsController@store')->name('admin.posts.store');

        // Category
    Route::get('/category','CategoryController@index')->name('admin.category.index');
    Route::get('/category/create','CategoryController@create')->name('admin.category.create');
    Route::post('/category/create','CategoryController@store')->name('admin.category.store');
    Route::get('/category/edit/{id}','CategoryController@edit')->name('admin.category.edit');
    Route::get('/category/destroy/{id}','CategoryController@destroy')->name('admin.category.destroy');
});