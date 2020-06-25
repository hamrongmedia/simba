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

Route::get('/', function () {
    return view('home');
});

Route::get('chuyen-muc-san-pham', function () {
    return view('chuyenmucsanpham');
});

Route::get('chi-tiet-san-pham', function () {
    return view('chitietsanpham');
});

Route::get('blog', function () {
    return view('blog');
});

Route::get('post', function () {
    return view('post');
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
//START ADMIN ROUTE
@include 'admin.php';

//Include user management route

@include_once 'login.php';

//START THEME OPTION ROUTE
@include 'theme_options.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');