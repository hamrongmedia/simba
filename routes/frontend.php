<?php
Route::namespace ('Frontend')->group(function () {

    Route::get('/bai-viet/{slug}', 'BlogController@getDetailPost')->name('post.detail');
    Route::get('/page/{slug}', 'BlogController@getDetailPage')->name('page.detail');
    Route::get('/chuyen-muc/{slug}', 'BlogController@getListPostOfCategory')->name('category.listpost');

    Route::get('/', 'HomeController@index')->name('home');
    // Routes Sản Phẩm

    Route::get('/lien-he', function () {
        return view('front-end.page.contact');
    });

    // Get product list by category.
    Route::get('/danh-muc/{product_cat_slug}', 'ProductController@getProductByCategory')->name('product.getProductByCat');
    //Get product detail by slug and id
    Route::get('/san-pham/{slug}', 'ProductController@getDetailProduct')->name('product.detail');

    // Order route
    Route::get('/dat-mua', 'OrderController@showOrderForm')->name('product.showOrderForm');
    Route::post('/dat-mua', 'OrderController@storeOrder')->name('product.storeOrder');

    Route::get('/dat-hang-thanh-cong', 'OrderController@orderSuccessNotify')->name('product.orderSuccess');

});