<?php

use Illuminate\Support\Facades\Route;
//'middleware' => 'webadmin',
Route::group(
    ['prefix' => 'admin', 'middleware' => ['web']],
    function () {
        Route::get('dashboard', 'Marrs\MarrsAdmin\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');

        Route::get('logout',  'Marrs\MarrsAdmin\Http\Controllers\Admin\DashboardController@index')->name('admin.logout');
        Route::resources([
            'users' => 'Marrs\MarrsAdmin\Http\Controllers\Admin\AdminController',
            'menus' => 'Marrs\MarrsAdmin\Http\Controllers\Admin\MenuController'
        ], ['as' => 'admin']);
    }
);
