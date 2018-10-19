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
    return view('layouts.master');
});

Route::prefix('auther')->group(function () {
    Route::get('/index', 'AuthersController@index')->name('auther.index');

    Route::post('/create', 'AuthersController@create')->name('auther.create');

    Route::get('/create', 'AuthersController@store')->name('auther.store');

    Route::get('/{id}/edit', 'AuthersController@edit')->name('auther.edit');

    Route::post('/{id}/edit', 'AuthersController@update')->name('auther.update');

    Route::get('/{id}/destroy', 'AuthersController@destroy')->name('auther.destroy');
});