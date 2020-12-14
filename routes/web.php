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

Route::group(['prefix' => 'admin/news', 'middleware' => 'auth'], function() {
    Route::get('create', 'Admin\NewsController@add');
    Route::post('create', 'Admin\NewsController@create');
});

//PHP/Laravel09_課題3
//Route::get('XXX', 'AAAController@bbb');

//PHP/Laravel09_課題4
Route::group(['prefix' => 'admin/profile', 'middleware' => 'auth'], function() {
    Route::get('create', 'Admin\ProfileController@add');
    Route::post('create', 'Admin\ProfileController@create');
    Route::get('edit', 'Admin\ProfileController@edit');
});

Auth::routes();
//Auth::logout();