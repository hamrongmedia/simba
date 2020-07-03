<?php
Route::namespace ('Frontend')->group(function () {

    Route::get('/bai-viet/{slug}', 'BlogController@getDetailPost')->name('post.detail');
    Route::get('/page/{slug}', 'BlogController@getDetailPage')->name('page.detail');
    Route::get('/chuyen-muc/{slug}', 'BlogController@getListPostOfCategory')->name('category.listpost');

});

Route::get('/lien-he', function () {
    return view('front-end.page.contact');
    //Homepage
});
Route::get('/', 'HomeController@index')->name('home');