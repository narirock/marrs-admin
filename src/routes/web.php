<?php

use Illuminate\Support\Facades\Route;
//'middleware' => 'webadmin',
Route::group(
    ['prefix' => 'admin', 'middleware' => ['web']],
    function () {
        //Rotas para autenticação
        Route::get('login', 'Marrs\MarrsAdmin\Http\Controllers\Auth\AdminAuthController@loginForm')->name('admin.loginForm');
        Route::post('login', 'Marrs\MarrsAdmin\Http\Controllers\Auth\AdminAuthController@login')->name('admin.login');

        Route::group(['middleware' => 'admin'], function () {
            Route::get('dashboard', 'Marrs\MarrsAdmin\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
            Route::get('logout',  'Marrs\MarrsAdmin\Http\Controllers\Auth\AdminAuthController@logout')->name('admin.logout');
            Route::resources([
                'users' => 'Marrs\MarrsAdmin\Http\Controllers\Admin\AdminController',
                'menus' => 'Marrs\MarrsAdmin\Http\Controllers\Admin\MenuController'
            ], ['as' => 'admin']);
        });
    }
);
