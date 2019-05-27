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


/*หน้าแรก*/

Route::get('/index', 'BookController@viewWelcome');
/*โชว์หน้าหนังสือแนะนำ*/
Route::get('/view-book', 'BookController@viewBook');

/*หน้าหนังสือที่ถูกสร้าง*/
Route::get('/view-create-book', 'BookController@viewCreateBook');
/*หน้าformสร้างหนังสือ*/
Route::get('/view-form-create-book','BookController@viewFormCreateBook');

Route::get('/view-book-form','BookController@viewFormCreateBook');
Route::post('/create-book','BookController@submitFormCreateBook');

Route::get('/listening','BookController@viewListening');
Route::get('/delete-book','BookController@deleteBook')->name('delete.book');
Route::get('/view-create-book','BookController@viewCreateBook')->name('book.list');



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



