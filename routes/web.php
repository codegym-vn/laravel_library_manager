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


Route::prefix('authors')->group(function () {
    Route::get('/', 'AuthorController@index')->name('author_index');

    Route::get('/create', 'AuthorController@create')->name('author_create');

    Route::post('/create', 'AuthorController@store')->name('author_store');

    Route::get('/{id}/edit', 'AuthorController@edit')->name('author_edit');

    Route::post('/{id}/edit', 'AuthorController@update')->name('author_update');

    Route::get('/{id}/destroy', 'AuthorController@destroy')->name('author_destroy');
});

Route::group(['prefix' => 'categories'], function (){
    Route::get('/', 'CategoryController@index')->name('categories_index');

   Route::get('/create-category', 'CategoryController@create')->name('category_create');

   Route::post('/add-category', 'CategoryController@store')->name('category_store');

   Route::get('/edit-category/{id}','CategoryController@edit')->name('category_edit');

   Route::post('/update-category/{id}','CategoryController@update')->name('category_update');

   Route::get('/delete-category/{id}','CategoryController@destroy')->name('category_destroy');
});

Route::group(['prefix' => 'books'], function (){
   Route::get('/','BooksController@index')->name('books_index');

   Route::get('/create-book','BooksController@create')->name('book_create');

   Route::post('/add-book','BooksController@store')->name('book_store');

   Route::get('/edit-book/{id}','BooksController@edit')->name('book_edit');

   Route::post('/update-book/{id}','BooksController@update')->name('book_update');

   Route::get('/delete-book/{id}','BooksController@destroy')->name('book_destroy');

   Route::get('/search-book','BooksController@searchBook')->name('book_search');

   Route::get('/filterBy-book','BooksController@filterBy')->name('book_filterBy');
});
