<?php

Route::group(['middleware' => 'api', 'namespace' => 'Api','prefix' => 'api/v1'], function () {

    /* Auth Routes */
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
    Route::post('auth/activate', 'Auth\AuthController@postActivate');
    Route::post('auth/login/token', 'Auth\AuthController@loginUsingToken');

    Route::resource('users','UserController');
});

/*********************************************************************************************************
 * Admin Routes
 ********************************************************************************************************/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['web','admin']], function () {

    Route::resource('users', 'UserController');
    Route::get('/', 'HomeController@dashboard');
});
    
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});
