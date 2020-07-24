<?php
Route::namespace ('Frontend')->group(function () {

    Route::get('ajax/ajaxShowProvinces','ProvinceController@getCities')->name('ajax.cities');
    Route::get('ajax/ajaxShowDistricts','ProvinceController@getDistricts')->name('ajax.districts');
    Route::get('ajax/ajaxShowWard','ProvinceController@getWards')->name('ajax.wards');

    Route::get('/bai-viet/{slug}', 'BlogController@getDetailPost')->name('post.detail');
    Route::get('/page/{slug}', 'BlogController@getDetailPage')->name('page.detail');
    Route::get('/chuyen-muc/{slug}', 'BlogController@getListPostOfCategory')->name('category.listpost');
    Route::get('/', 'HomeController@index')->name('home');
    // Routes Sản Phẩm

    Route::get('/lien-he', function () {
        return view('front-end.page.contact');
    });

    Route::get('gio-hang','CartController@index')->name('cart.index');
    Route::post('gio-hang','CartController@store')->name('cart.add');

    Route::post('ajax/cart/remove','CartController@removeCartAjax')->name('ajax.cart.remove');

    Route::get('shop', 'ShopController@index')->name('shop.index');

    // Get product list by category.
    Route::get('/danh-muc/{product_cat_slug}', 'ProductController@getProductByCategory')->name('product.getProductByCat');
    //Get product detail by slug and id
    Route::get('san-pham/{slug}', 'ProductController@show')->name('product.detail');

    // Order route
    Route::get('dat-mua', 'CheckoutController@index')->name('checkout.index');
    Route::post('dat-mua', 'CheckoutController@store')->name('checkout.store');

    Route::get('dat-hang-thanh-cong/{order_code}', 'CheckoutController@success')->name('checkout.success');

});