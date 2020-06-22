<?php
Route::get('hrm/theme-options', function () {
    return view('admin/theme_options');
});
Route::get('mail-smtp', function () {
    return view('admin/smtp_email');
});
Route::get('recover-password-d', function () {
    return view('admin/recover-password');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'hrm/theme', 'namespace' => 'Admin'], function () {
    // Menu manage routes
    Route::get('/', 'ThemeController@index')->name('admin.theme.index');
    Route::get('/create', 'ThemeController@create')->name('admin.theme.create');
    Route::post('/create', 'ThemeController@store')->name('admin.theme.store');
    Route::get('/edit/{id}', 'ThemeController@edit')->name('admin.theme.edit');
    Route::post('/edit/{id}', 'ThemeController@update')->name('admin.theme.update');
    Route::post('/delete', 'ThemeController@delete')->name('admin.theme.delete');
    Route::post('/savetree', 'ThemeController@saveTree')->name('admin.theme.savetree');

});