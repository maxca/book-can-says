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

Route::get('/view-book-form','BookController@viewFormCreateBook');
Route::get('/create-book','BookController@ViewCreateBook');

Route::post('/create-book','BookController@submitFormCreateBook');
Route::get('/book-created','BookController@viewCreateBook');
Route::get('/delete-book','BookController@deleteBook')->name('delete.book');
Route::get('/view-create-book','BookController@viewCreateBook')->name('book.list');

Route::get('/view-book','PimController@viewBook');
Route::get('/welcome','JammController@welcome');

Route::get('view-new-record','BookController@recordAudio');




Route::get('/view-listener-rec','UploadSoundController@viewRecordListener');


Route::get('recorder', function () {
    return view('recorder.index');
});


Route::get('facebook','facebookController@facebookLogin');
Route::get('callback-url','facebookController@callBack');


Route::group(['prefix' => 'recorder'], function () {
    Route::get('/', 'UploadSoundController@index');
    Route::post('/upload', 'UploadSoundController@upload');
});

Route::get('facebook', 'facebookController@facebookLogin');
Route::get('callback-url', 'facebookController@callBack');



Route::get('login/facebook', 'Auth\FacebookLoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\FacebookLoginController@handleProviderCallback');

Route::get('login/google', 'Auth\GoogleLoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\GoogleLoginController@handleProviderCallback');



