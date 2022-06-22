<?php

use Illuminate\Support\Facades\Route;
//'middleware' => 'webadmin',
Route::group(
    ['prefix' => 'admin', 'middleware' => ['web']],
    function () {
        //Rotas para autenticação
        Route::get('login', 'Marrs\MarrsAdmin\Http\Controllers\Auth\AdminAuthController@loginForm')->name('admin.loginForm');
        Route::post('login', 'Marrs\MarrsAdmin\Http\Controllers\Auth\AdminAuthController@login')->name('admin.login');
        Route::get('/password', 'Marrs\MarrsAdmin\Http\Controllers\Auth\PasswordResetController@reset');
        Route::post('password/email', 'Marrs\MarrsAdmin\Http\Controllers\Auth\PasswordResetController@sendpasswordemail');
        Route::get('/password/resetform/{token}', 'Marrs\MarrsAdmin\Http\Controllers\Auth\PasswordResetController@resetform');
        Route::post('/password/update', 'Marrs\MarrsAdmin\Http\Controllers\Auth\PasswordResetController@passwordupdate');

        Route::group(['middleware' => 'admin'], function () {
            Route::get('/', 'Marrs\MarrsAdmin\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
            Route::get('logout',  'Marrs\MarrsAdmin\Http\Controllers\Auth\AdminAuthController@logout')->name('admin.logout');
            Route::resources([
                'users' => 'Marrs\MarrsAdmin\Http\Controllers\Admin\AdminController',
                'menus' => 'Marrs\MarrsAdmin\Http\Controllers\Admin\MenuController'
            ], ['as' => 'admin']);

            Route::post('file/upload', 'Marrs\MarrsAdmin\Http\Controllers\Admin\FileUploadController@upload')->name('file.upload');
            Route::post('image/upload', 'Marrs\MarrsAdmin\Http\Controllers\Admin\FileUploadController@imageUpload')->name('image.upload');
            Route::post('image/line/upload', 'Marrs\MarrsAdmin\Http\Controllers\Admin\FileUploadController@imageLineUpload')->name('image.line.upload');
        });
    }
);
