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


Route::get('/index', 'BookController@viewWelcome');
Route::get('/view-book', 'BookController@viewBook');


Route::get('/view-create-book', 'BookController@viewCreateBook');
Route::get('/view-form-create-book','BookController@viewFormCreateBook');
Route::post('/create-book','BookController@submitFormCreateBook');
Route::get('/book-created','BookController@viewCreateBook');
Route::get('/delete-book','BookController@deleteBook')->name('delete.book');
Route::get('/view-create-book','BookController@viewCreateBook')->name('book.list');




Route::get('/view-listener-rec','UploadSoundController@viewRecordListener');


Route::get('recorder', function () {
    return view('recorder.index');
});


Route::get('facebook','facebookController@facebookLogin');
Route::get('callback-url','facebookController@callBack');

