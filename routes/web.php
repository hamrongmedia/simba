<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('chuyen-muc-san-pham', function () {
    return view('chuyenmucsanpham');
});

Route::get('feedback', function () {
    return view('feedback');
});

Route::get('giohang', function () {
    return view('giohang');
});
Route::get('tim-kiem', function () {
    return view('tim_kiem');
});

//Include user management route
//START ADMIN ROUTE
@include_once 'admin.php';

@include_once 'login.php';

// theme
@include_once 'theme.php';

@include_once 'frontend.php';

@include_once 'product.php';

@include_once 'product_reviews.php';

@include_once 'admin.order.php';

Auth::routes();

Route::get('/home', 'Frontend\HomeController@index')->name('home');

Route::group(['prefix' => 'filemanager', 'middleware' => 'auth:admin'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});