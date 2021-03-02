<?php

use \Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('app.root_route_group')
], function () {

    Route::group([
        'prefix' => 'api',
        'as' => 'api.'
    ], function () {
        Route::get('/listar-produtos', 'Api\ApiProductController@index');
        Route::post('/adicionar-produtos', 'Api\ApiProductController@store');
        Route::put('/baixar-produtos/{id}', 'Api\ApiProductController@decrement');
    });

});
