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

Route::get('/', [
    'uses' => 'HomeController@index', 
    'as' => 'home'
]);

// Authentication routes...
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin', 
    'as' => 'login'
]);
Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin', 
    'as' => 'login'
]);
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister', 
    'as' => 'register'
]);
Route::post('register', [
    'uses' => 'Auth\AuthController@postRegister', 
    'as' => 'register'
]);

// Password reset link request routes...
Route::get('password/email', [
    'uses' => 'Auth\PasswordController@getEmail', 
    'as' => 'password.email'
]);
Route::post('password/email', [
    'uses' => 'Auth\PasswordController@postEmail', 
    'as' => 'password.email'
]);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('confirmation/{token}', [
    'uses' => 'Auth\AuthController@getConfirmation', 
    'as' => 'confirmation'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('account', function () {
        return view('account');
    }); 

    Route::group(['middleware' => 'verified'], function () {
        Route::get('publish', function () {
            return view('publish');
        });

        Route::post('publish', function () {
            return Request::all();
        });
    });
});