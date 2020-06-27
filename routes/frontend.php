<?php
Route::namespace ('Frontend')->group(function () {
    Route::get('/hrm/tin-tuc/{slug}', 'BlogController@getListPost')->name('post.list');
    Route::get('/{slug}', 'BlogController@getDetailPost')->name('post.detail'); //lỗi ở đây

});