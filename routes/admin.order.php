<?php
Route::group(['prefix' => 'hrm', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    Route::get('order', 'OrderController@index')->name('admin.order.index');
    Route::get('order/edit/{id}', 'OrderController@edit')->name('admin.order.edit');
    Route::put('order/update', 'OrderController@update')->name('admin.order.update');
    Route::post('order/delete', 'OrderController@delete')->name('admin.order.delete');
    Route::post('order/status', 'OrderController@changeStatus')->name('admin.order.status');
    Route::get('list-order', 'OrderController@listOrder')->name('admin.order.list_order');
});