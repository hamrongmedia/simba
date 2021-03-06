<?php
Route::prefix('hrm')->namespace('Admin')->group(function () {

    Route::get('/', 'AdminController@index')->name('admin.index');

    // Posts
    Route::get('/posts', 'PostsController@index')->name('admin.post.index');
    Route::get('/post/create', 'PostsController@create')->name('admin.post.create');
    Route::post('/post/create', 'PostsController@store')->name('admin.post.store');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('admin.post.edit');
    Route::post('/post/edit/{id}', 'PostsController@update')->name('admin.post.update');
    Route::post('/post/destroy', 'PostsController@destroy')->name('admin.post.destroy');

    // Category
    Route::get('/post-category', 'CategoryController@index')->name('admin.category.index');
    Route::get('/post-category/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('/post-category/create', 'CategoryController@store')->name('admin.category.store');
    Route::get('/post-category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/post-category/edit/{id}', 'CategoryController@update')->name('admin.category.update');
    Route::post('/post-category/destroy', 'CategoryController@destroy')->name('admin.category.destroy');

    // Pages
    Route::get('/pages', 'PagesController@index')->name('admin.page.index');
    Route::get('/page/create', 'PagesController@create')->name('admin.page.create');
    Route::post('/page/create', 'PagesController@store')->name('admin.page.store');
    Route::get('/page/edit/{id}', 'PagesController@edit')->name('admin.page.edit');
    Route::post('/page/edit/{id}', 'PagesController@update')->name('admin.page.update');
    Route::post('/page/destroy', 'PagesController@destroy')->name('admin.page.destroy');

    //Product Category
    Route::resource('product-category', 'ProductCategoryController');
});