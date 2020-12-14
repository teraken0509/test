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

Route::group(['prefix' => 'admin/news'], function() {
    Route::get('create', 'Admin\NewsController@add')->middleware('auth');
});

//PHP/Laravel09_課題3
//Route::get('XXX', 'AAAController@bbb');

//PHP/Laravel09_課題4
Route::group(['prefix' => 'admin/profile'], function() {
    Route::get('create', 'Admin\ProfileController@add')->middleware('auth');
    Route::get('edit', 'Admin\ProfileController@edit')->middleware('auth');
});

Auth::routes();
//Auth::logout();