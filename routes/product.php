<?php
Route::prefix('/hrm')->middleware('auth:admin')->namespace('Admin')->group(function () {

//Product Category
	Route::resource('product-category', 'ProductCategoryController');
	Route::resource('product-type', 'ProductTypeController');
	Route::any('product-attribute/{id}/create-value', 'ProductAttributeController@createValue')->name('createAttributeValue');
	Route::get('product-attribute/delete-value/{id}', 'ProductAttributeController@deleteValue')->name('deleteAttributeValue');
	Route::resource('product-attribute', 'ProductAttributeController');
	Route::get('product/get-value', 'ProductController@getValue')->name('ajaxGetValue');

    Route::get('/product', 'ProductController@index')->name('admin.product.index');
    Route::get('/product/create', 'ProductController@create')->name('admin.product.create');
    Route::post('/product/create', 'ProductController@store')->name('admin.product.store');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('admin.product.edit');
    Route::post('/product/edit/{id}', 'ProductController@update')->name('admin.product.update');
    Route::post('/product/destroy', 'ProductController@delete')->name('admin.product.destroy');
    Route::get('/product/search', 'ProductController@search')->name('admin.product.search');
});