<?php
Route::namespace('Frontend')->group(function () {
	Route::get('/tin-tuc/{slug}', 'BlogController@getListPost')->name('post.list');
	Route::get('/{slug}', 'BlogController@getDetailPost')->name('post.detail');
});