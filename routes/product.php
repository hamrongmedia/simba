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
    Route::get('product/table-ajax', 'ProductController@getTableProduct')->name('admin.product.table_ajax');
    Route::post('product/create', 'ProductController@store')->name('admin.product.store');
    Route::get('product/{id}', 'ProductController@edit')->name('admin.product.edit');
    Route::put('product/{id}', 'ProductController@update')->name('admin.product.update');
    Route::post('product/destroy', 'ProductController@delete')->name('admin.product.destroy');
    Route::get('product/search', 'ProductController@search')->name('admin.product.search');

    Route::get('product-info-edit', 'ProductInfoController@show')->name('admin.product.info.show');
    Route::post('product/{id}/product-info', 'ProductInfoController@store')->name('admin.product.info.store');
    Route::post('product/{id}/product-info-update', 'ProductInfoController@update')->name('admin.product.info.edit');
    Route::post('product-info-update', 'ProductInfoController@update')->name('admin.product.info.update');
    Route::post('product-info-delete', 'ProductInfoController@delete')->name('admin.product.info.delete');

    Route::get('product-info-reload', 'ProductInfoController@reload')->name('admin.product.info.reload');

    Route::post('product-info-all/{id}', 'ProductInfoController@postGenerateAllVersions')->name('admin.product.info.all');

    Route::get('product-reviews', 'ProductReviewsController@index')->name('admin.product_reviews.index');
    Route::get('product-reviews/create', 'ProductReviewsController@create')->name('admin.product_reviews.create');
    Route::post('product-reviews/create', 'ProductReviewsController@store')->name('admin.product_reviews.store');
    Route::get('product-reviews/{id}', 'ProductReviewsController@edit')->name('admin.product_reviews.edit');
    Route::put('product-reviews/{id}', 'ProductReviewsController@update')->name('admin.product_reviews.update');
    Route::post('product-reviews/destroy', 'ProductReviewsController@delete')->name('admin.product_reviews.delete');
    Route::get('product-reviews/search', 'ProductReviewsController@search')->name('admin.product_reviews.search');

    Route::get('product-question', 'ProductQuestionController@index')->name('admin.product_question.index');
    Route::get('product-question/create', 'ProductQuestionController@create')->name('admin.product_question.create');
    Route::post('product-question/create', 'ProductQuestionController@store')->name('admin.product_question.store');
    Route::get('product-question/{id}', 'ProductQuestionController@edit')->name('admin.product_question.edit');
    Route::put('product-question/{id}', 'ProductQuestionController@update')->name('admin.product_question.update');
    Route::post('product-question/destroy', 'ProductQuestionController@delete')->name('admin.product_question.delete');
    Route::get('product-question/search', 'ProductQuestionController@search')->name('admin.product_question.search');
});