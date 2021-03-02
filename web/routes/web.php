<?php

use \Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('app.root_route_group')
], function () {

    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.'
    ], function () {

        Route::group([
            'prefix' => 'auth',
            'namespace' => 'Auth',
            'as' => 'auth.'
        ], function () {
            Route::get('/', 'LoginController@index')->name('login');
            Route::post('/login', 'LoginController@login')->name('login.confirm');
            Route::get('/logout', 'LoginController@logout')->name('logout');
        });

        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
            'middleware' => ['CheckLogin', 'CheckPermission']
        ], function () {
            Route::get('/', 'UsersController@index')->name('list');
            Route::get('/edit/', 'UsersController@create')->name('create');
            Route::get('/edit/{id}', 'UsersController@edit')->name('edit');
            Route::post('/store', 'UsersController@store')->name('store');
            Route::post('/update/{id}', 'UsersController@update')->name('update');
            Route::get('/delete/{id}', 'UsersController@delete')->name('delete');
        });

        Route::group([
            'prefix' => 'products',
            'as' => 'products.',
            'middleware' => ['CheckLogin', 'CheckPermission']
        ], function () {
            Route::get('/', 'ProductsController@index')->name('list');
            Route::get('/edit/', 'ProductsController@create')->name('create');
            Route::get('/edit/{id}', 'ProductsController@edit')->name('edit');
            Route::post('/store', 'ProductsController@store')->name('store');
            Route::post('/update/{id}', 'ProductsController@update')->name('update');
            Route::get('/delete/{id}', 'ProductsController@delete')->name('delete');
            Route::post('/decrement/{id}', 'ProductsController@decrement')->name('decrement');
        });

        Route::group([
            'prefix' => 'reports',
            'as' => 'reports.',
            'middleware' => ['CheckLogin', 'CheckPermission']
        ], function () {
            Route::get('/daily', 'ReportsController@daily')->name('daily');
            Route::get('/stock/', 'ReportsController@stock')->name('stock');
        });

        Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('CheckLogin');

        Route::get('/', function () {
            return redirect()->route('admin.auth.login');
        });
    });

    Route::get('/', function () {
        return redirect()->route('admin.auth.login');
    });
});
