<?php
Route::prefix('/hrm')->middleware('auth:admin')->namespace('Admin')->group(function () {

    Route::post('slug/creat', 'SlugController@store')->name('slug.create');

    Route::get('/', 'AdminController@index')->name('admin.index');

    // Posts
    Route::get('/posts', 'PostsController@index')->name('admin.post.index');
    Route::get('/post/create', 'PostsController@create')->name('admin.post.create');
    Route::post('/post/create', 'PostsController@store')->name('admin.post.store');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('admin.post.edit');
    Route::post('/post/edit/{id}', 'PostsController@update')->name('admin.post.update');
    Route::post('/post/delete', 'PostsController@delete')->name('admin.post.delete');
    Route::get('/post/search', 'PostsController@search')->name('admin.post.search');
    Route::get('/posts/list-post', 'PostsController@listPost')->name('admin.post.list_post');

    // Category
    Route::get('/post-category', 'CategoryController@index')->name('admin.category.index');
    Route::get('/post-category/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('/post-category/create', 'CategoryController@store')->name('admin.category.store');
    Route::get('/post-category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/post-category/edit/{id}', 'CategoryController@update')->name('admin.category.update');
    Route::post('/post-category/destroy', 'CategoryController@destroy')->name('admin.category.destroy');
    Route::get('/post-category/search', 'CategoryController@search')->name('admin.category.search');
    Route::get('/post-category/list-categories', 'CategoryController@listCategories')->name('admin.category.list_categories');

    // Pages
    Route::get('/pages', 'PagesController@index')->name('admin.page.index');
    Route::get('/page/create', 'PagesController@create')->name('admin.page.create');
    Route::post('/page/create', 'PagesController@store')->name('admin.page.store');
    Route::get('/page/edit/{id}', 'PagesController@edit')->name('admin.page.edit');
    Route::post('/page/edit/{id}', 'PagesController@update')->name('admin.page.update');
    Route::post('/page/destroy', 'PagesController@destroy')->name('admin.page.destroy');
    Route::get('/page/search', 'PagesController@search')->name('admin.page.search');

    Route::delete('ajax/destroy', 'DestroyController@destroy')->name('admin.ajax.destroy');
    Route::post('ajax/restore', 'RestoreController@restore')->name('admin.ajax.restore');

    //API instagram
    Route::get('/api/instagram', 'InstagramController@index')->name("admin.instagram.index");
    Route::get('/api/instagram/edit/{id}', 'InstagramController@edit')->name("admin.instagram.edit") ; // Sửa 
    Route::post('/api/instagram/update', 'InstagramController@update'); // Xử lý sửa 
});