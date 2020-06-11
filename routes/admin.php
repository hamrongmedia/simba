<?php
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/','AdminController@index')->name('admin.index');
});