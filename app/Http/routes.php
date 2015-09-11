<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('posts/{id}', [
        'uses' => 'PostsController@show',
        'as'   => 'post_show_path',
    ]);
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/', function () {
        return 'Hola soy tu api';
    });
});

Route::get('auth/login', [
    'uses' => 'AuthController@index',
    'as'   => 'auth_show_path',
]);
Route::post('auth/login', [
    'uses' => 'AuthController@store',
    'as'   => 'auth_store_path',
]);
Route::get('auth/logout', [
    'uses' => 'AuthController@destroy',
    'as'   => 'auth_destroy_path',
]);
