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

Route::get('feedback', function () {
    return view('feedback');
});

Route::get('giohang', function () {
    return view('giohang');
});
Route::get('tim-kiem', function () {
    return view('tim_kiem');
});

@include_once 'frontend.php';

//Include user management route
//START ADMIN ROUTE
@include_once 'admin.php';

@include_once 'login.php';

// theme
@include_once 'theme.php';

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'filemanager', 'middleware' => 'auth:admin'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});