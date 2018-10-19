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

use Illuminate\Support\Facades\Route;

Route::get('/test', function (){
   return view('categories.create');
});


Route::prefix('authers')->group(function () {
    Route::get('/index', 'AuthersController@index')->name('auther_index');

    Route::get('/create', 'AuthersController@create')->name('auther_create');

    Route::post('/create', 'AuthersController@store')->name('auther_store');

    Route::get('/{id}/edit', 'AuthersController@edit')->name('auther_edit');

    Route::post('/{id}/edit', 'AuthersController@update')->name('auther_update');

    Route::get('/{id}/destroy', 'AuthersController@destroy')->name('auther_destroy');
});

Route::group(['prefix' => 'home'], function (){
   Route::get('/', 'CategoryController@index')->name('categories_index');

   Route::get('/create-category', 'CategoryController@create')->name('category_create');

   Route::post('/add-category', 'CategoryController@store')->name('category_store');

   Route::get('/edit-category/{id}','CategoryController@edit')->name('category_edit');

   Route::post('/update-category/{id}','CategoryController@update')->name('category_update');

   Route::get('/delete-category/{id}','CategoryController@destroy')->name('category_destroy');
});
