<?php
Route::namespace ('Frontend')->group(function () {

    Route::get('/bai-viet/{slug}', 'BlogController@getDetailPost')->name('post.detail');
    Route::get('/page/{slug}', 'BlogController@getDetailPage')->name('page.detail');
    Route::get('/chuyen-muc/{slug}', 'BlogController@getListPostOfCategory')->name('category.listpost');

    Route::get('/', 'HomeController@index')->name('home');

    // Routes Sản Phẩm
    Route::get('/san-pham/{slug}', 'ProductController@getDetailProduct')->name('product.detail');

	Route::get('/lien-he', function () {
		return view('front-end.page.contact'
	);
});