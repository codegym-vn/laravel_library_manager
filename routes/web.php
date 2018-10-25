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


Route::get('/check-student', function () {
   return view('bills.studentCode');
})->name('student_check');

Route::group(['prefix' => 'bills'], function (){
    Route::get('/', 'BillController@index')->name('bills_index');

    Route::post('/add-bill', 'BillController@store')->name('bill_store');

    Route::get('/check-student', 'BillController@authentication')->name('authentication');

    Route::get('/delete-bill/{id}', 'BillController@destroy')->name('bill_destroy');

    Route::get('/list-student', 'StudentController@list')->name('student_list');

});


//trang hien thi
Route::group(['prefix' => 'home'], function (){
    Route::get('/','StudentController@index')->name('student_index');

    Route::get('/{id}/books', 'StudentController@category_list_book')->name('student_category_book');

    Route::get('/author','StudentController@list_author')->name('student_author_list');

    Route::get('/{id}/details-book','StudentController@details_book')->name('student_details_book');

    Route::get('/search', 'StudentController@search')->name('student_search');

    Route::get('/{id}/author-list-book', 'StudentController@author_list_book')->name('student_author_book');
});
