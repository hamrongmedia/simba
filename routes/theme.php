<?php
Route::get('mail-smtp', function () {
    return view('admin/smtp_email');
});
Route::get('recover-password-d', function () {
    return view('admin/recover-password');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'hrm/theme-options', 'namespace' => 'Admin'], function () {
    // Menu manage routes
    Route::get('/', 'ThemeOptionsController@index')->name('admin.themeoptions.index');

    Route::get('/social', 'ThemeOptionsController@social')->name('admin.themeoptions.social');
    Route::post('/social', 'ThemeOptionsController@updatesocial')->name('admin.themeoptions.updatesocial');

    Route::get('/header', 'ThemeOptionsController@header')->name('admin.themeoptions.header');
    Route::post('/header', 'ThemeOptionsController@updateheader')->name('admin.themeoptions.updateheader');

        Route::get('/homepage', 'ThemeOptionsController@homepage')->name('admin.themeoptions.homepage');
    Route::post('/homepage', 'ThemeOptionsController@updatehomepage')->name('admin.themeoptions.updatehomepage');

    Route::get('/script', 'ThemeOptionsController@script')->name('admin.themeoptions.script');
    Route::post('/script', 'ThemeOptionsController@updatescript')->name('admin.themeoptions.updatescript');

    Route::get('/footer', 'ThemeOptionsController@footer')->name('admin.themeoptions.footer');
    Route::post('/footer', 'ThemeOptionsController@updatefooter')->name('admin.themeoptions.updatefooter');

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