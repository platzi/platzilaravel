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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as'   => 'home_path',
    ]);

    Route::get('posts/create', [
        'uses' => 'PostsController@create',
        'as'   => 'post_create_path',
    ]);
    Route::post('posts/create', [
        'uses' => 'PostsController@store',
        'as'   => 'post_store_path',
    ]);

    Route::get('posts/{id}/edit', [
        'uses' => 'PostsController@edit',
        'as'   => 'post_edit_path',
    ])->where('id', '[0-9]+');

    Route::patch('posts/{id}/edit', [
        'uses' => 'PostsController@update',
        'as'   => 'post_patch_path',
    ])->where('id', '[0-9]+');

    Route::delete('posts/{id}/edit', [
        'uses' => 'PostsController@destroy',
        'as'   => 'post_delete_path',
    ])->where('id', '[0-9]+');

    Route::get('posts/{id}', [
        'uses' => 'PostsController@show',
        'as'   => 'post_show_path',
    ])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('/', function () {
        return 'Hola soy tu api';
    });
});
