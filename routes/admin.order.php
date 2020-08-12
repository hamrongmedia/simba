<?php
Route::group(['prefix' => 'hrm', 'middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
    Route::get('order', 'OrderController@index')->name('admin.order.index');
    Route::get('order/edit/{id}', 'OrderController@edit')->name('admin.order.edit');
    Route::post('order/{id}/update', 'OrderController@update')->name('admin.order.update');
    Route::post('order/delete', 'OrderController@delete')->name('admin.order.delete');
    Route::post('order/status', 'OrderController@changeStatus')->name('admin.order.status');
    Route::get('list-order', 'OrderController@listOrder')->name('admin.order.list_order');

    /*
    * Order Item Group Route
    */
    Route::post('order/delete_item', 'OrderItemController@destroy')->name('admin.order.item.destroy');
    Route::get('order/add_item', 'OrderItemController@newItem')->name('admin.order.item.new');
	/*
	* Order Status Group Route
	*/
    Route::get('order-status','OrderStatusController@index')->name('admin.order_status.index');
    Route::get('order-status/create','OrderStatusController@create')->name('admin.order_status.create');
    Route::post('order-status','OrderStatusController@store')->name('admin.order_status.store');
    Route::get('order-status/{id}/edit','OrderStatusController@show')->name('admin.order_status.edit');
    Route::put('order-status/{id}','OrderStatusController@store')->name('admin.order_status.update');
    Route::delete('order-status-destroy','OrderStatusController@destroy')->name('admin.order_status.destroy');

	/*
	* Payment Method Group Route
	*/
    Route::get('payment-method','PaymentMethodController@index')->name('admin.payment_status.index');
    Route::get('payment-method/create','PaymentMethodController@create')->name('admin.payment_status.create');
    Route::post('payment-method','PaymentMethodController@store')->name('admin.payment_status.store');
    Route::get('payment-method/{id}/edit','PaymentMethodController@show')->name('admin.payment_status.edit');
    Route::put('payment-method/{id}','PaymentMethodController@store')->name('admin.payment_status.update');
    Route::delete('payment-method-destroy','PaymentMethodController@destroy')->name('admin.payment_status.destroy');

	/*
	* Shipping Status Group Route
	*/
    Route::get('shipping-status','ShippingStatusController@index')->name('admin.shipping_status.index');
    Route::get('shipping-status/create','ShippingStatusController@create')->name('admin.shipping_status.create');
    Route::post('shipping-status','ShippingStatusController@store')->name('admin.shipping_status.store');
    Route::get('shipping-status/{id}/edit','ShippingStatusController@show')->name('admin.shipping_status.edit');
    Route::put('shipping-status/{id}','ShippingStatusController@store')->name('admin.shipping_status.update');
    Route::delete('shipping-status-destroy','ShippingStatusController@destroy')->name('admin.shipping_status.destroy');

});