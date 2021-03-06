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

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'hrm/mail', 'namespace' => 'Admin'], function () {
    // Menu manage routes
    Route::get('/', 'MailSettingController@index')->name('admin.mailsetting.index');
    Route::get('/create', 'MailSettingController@create')->name('admin.mailsetting.create');
    Route::post('/create', 'MailSettingController@store')->name('admin.mailsetting.store');
    Route::get('/edit/{id}', 'MailSettingController@edit')->name('admin.mailsetting.edit');
    Route::post('/edit/{id}', 'MailSettingController@update')->name('admin.mailsetting.update');
    Route::get('/delete/{id}', 'MailSettingController@delete')->name('admin.mailsetting.delete');

});

Route::group(['prefix' => 'hrm', 'middleware' => ['auth:admin']], function () {
    Route::get('/filemanage', function () {
        return view('admin.pages.file_manage.file_manage');
    });
});