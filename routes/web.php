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

Route::get('/', function () {
    return view('welcome');
});


//管理者ログイン
Route::group(['prefix' => 'admin'], function(){
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Admin\RegisterController@register');
});


//管理者ログイン後
Route::group(['prefix' => 'admin/news', 'middleware' => 'auth:admin'], function() {
    Route::get('create', 'Admin\NewsController@add');
    Route::post('create', 'Admin\NewsController@create');
    Route::get('/', 'Admin\NewsController@index');
    Route::get('edit', 'Admin\NewsController@edit');
    Route::post('edit', 'Admin\NewsController@update');
    Route::get('delete', 'Admin\NewsController@delete');
});

Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth:admin'], function() {
    Route::get('create', 'Admin\ProfileController@add');
    Route::post('create', 'Admin\ProfileController@create');
    Route::get('edit', 'Admin\ProfileController@edit');
    Route::post('edit', 'Admin\ProfileController@update');
});


//ユーザログイン後
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/news', 'NewsController@index');
    Route::get('/profile', 'ProfileController@index');
});


Auth::routes();
