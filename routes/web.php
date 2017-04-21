<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@showWelcomeView');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/home', 'Admin\HomeController@index')->name('admin_home');
});

Route::group(['prefix' => 'social'], function () {
    Route::get('redirect/{provider}', 'Auth\SocialAuthController@redirect');
    Route::get('callback/{provider}', 'Auth\SocialAuthController@callback');
    Route::get('update-email', 'HomeController@showUpdateEmailForm');
    Route::post('update-email', 'HomeController@updateEmail');
});

