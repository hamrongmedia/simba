<?php
Route::prefix('/hrm')->middleware('auth:admin')->namespace('Admin')->group(function () {
    Route::resource('product-category', 'ProductCategoryController');
    Route::resource('product-type', 'ProductTypeController');
    Route::any('product-attribute/{id}/create-value', 'ProductAttributeController@createValue')->name('createAttributeValue');
    Route::get('product-attribute/delete-value/{id}', 'ProductAttributeController@deleteValue')->name('deleteAttributeValue');
    Route::resource('product-attribute', 'ProductAttributeController');
    Route::get('product/get-value', 'ProductController@getValue')->name('ajaxGetValue');

    Route::post('product/image/upload', 'ProductController@uploadImages')->name('admin.product.image.upload');
    Route::post('product/image/remove', 'ProductController@removeImage')->name('admin.product.image.remove');

    Route::get('product', 'ProductController@index')->name('admin.product.index');
    Route::get('product/create', 'ProductController@create')->name('admin.product.create');
    Route::post('product/create', 'ProductController@store')->name('admin.product.store');
    Route::get('product/{id}', 'ProductController@edit')->name('admin.product.edit');
    Route::put('product/{id}', 'ProductController@update')->name('admin.product.update');
    Route::post('product/destroy', 'ProductController@delete')->name('admin.product.destroy');
    Route::get('product/search', 'ProductController@search')->name('admin.product.search');

    Route::get('product-info/{id}', 'ProductInfoController@show');
    Route::post('product/{id}/product-info', 'ProductInfoController@store')->name('admin.product.info.store');
    Route::post('product-info/delete', 'ProductInfoController@delete')->name('admin.product.info.delete');

    Route::get('product-reviews', 'ProductReviewsController@index')->name('admin.product_reviews.index');
    Route::get('product-reviews/create', 'ProductReviewsController@create')->name('admin.product_reviews.create');
    Route::post('product-reviews/create', 'ProductReviewsController@store')->name('admin.product_reviews.store');
    Route::get('product-reviews/{id}', 'ProductReviewsController@edit')->name('admin.product_reviews.edit');
    Route::put('product-reviews/{id}', 'ProductReviewsController@update')->name('admin.product_reviews.update');
    Route::post('product-reviews/destroy', 'ProductReviewsController@delete')->name('admin.product_reviews.delete');
    Route::get('product-reviews/search', 'ProductReviewsController@search')->name('admin.product_reviews.search');
});