<?php
Route::group(['prefix' => 'hrm', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    Route::get('product-reviews', 'ProductReviewsController@index')->name('admin.product_reviews.index');
    Route::get('product-reviews/{id}', 'ProductReviewsController@edit')->name('admin.product_reviews.edit');
    Route::put('product-reviews/{id}', 'ProductReviewsController@update')->name('admin.product_reviews.update');
    Route::post('product-reviews/delete', 'ProductReviewsController@delete')->name('admin.product_reviews.delete');
    Route::get('product-reviews/search', 'ProductReviewsController@search')->name('admin.product_reviews.search');
    Route::post('product-reviews/reply', 'ProductReviewsController@reply')->name('admin.product_reviews.reply');
    Route::post('product-reviews/status', 'ProductReviewsController@changeStatus')->name('admin.product_reviews.status');
});

Route::group(['prefix' => 'product-reviews'], function () {
    Route::post('product-reviews/create', 'Admin\ProductReviewsController@store')->name('admin.product_reviews.store');
    // Route::post('product-reviews/create', 'Admin\ProductReviewsController@showReview')->name('admin.product_reviews.show_review');
    Route::get('product-reviews/product_id/{product_id}', 'Admin\ProductReviewsController@getReviewsByProduct')->name('admin.product_reviews.get_by_product');
});