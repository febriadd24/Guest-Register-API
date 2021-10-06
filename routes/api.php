<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function() {
    Route::resource('interaction', 'InteractionController', [
        'except' => ['create', 'edit']
    ]);
    Route::resource('tujuan', 'TujuanController', [
        'except' => ['create', 'edit']
        ]);
            Route::post('login', 'UserController@login');
            Route::post('register', 'UserController@register');
            Route::resource('AXA', 'AXAController', [
                'except' => ['index','create', 'edit']
                ]);
                Route::resource('BANKDIY', 'BANKDIYController', [
                    'except' => ['update','create', 'edit']
                    ]);
            Route::group(['middleware' => 'auth:api'], function(){
            Route::post('details', 'UserController@details');
            Route::resource('pengunjung', 'PengunjungController', [
        'except' => ['create', 'edit']
        ]);

        });

});


