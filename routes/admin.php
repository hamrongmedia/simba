<?php
Route::prefix('hrm')->namespace('Admin')->group( function () {
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('/news','ShopNewsController@index')->name('news.index');
});