<?php
Route::group(['name' => 'customer.', 'namespace' => 'Customer'], function () {
    Route::get('/', 'CustommerPost@index')->name('post');
});