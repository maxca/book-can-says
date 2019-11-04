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

//Route::get('/', function () {
//    return view('welcome');
//});


/*หน้าแรก*/

Route::get('/', 'BookController@viewWelcome');

/*โชว์หน้าฟังเสียง*/
Route::get('/view-blind', 'BookController@viewBlind')->name('home.view-blind');


Route::group(['middleware' => 'auth'], function () {
    /*โชว์หน้าหนังสือแนะนำ*/
    Route::get('/view-book', 'BookController@viewBook')->name('home.view-book');

    Route::get('/view-create-book', 'BookController@viewCreateBook')->name('view-created-book');
    /*หน้าformสร้างหนังสือ*/
    Route::get('/view-form-create-book', 'BookController@viewFormCreateBook');

    /*หน้าeditหนังสือ*/
    Route::get('/view-form-editBook', 'BookController@viewFormEditBook')->name('form.edit.book');
    Route::post('/edit-book', 'BookController@submitEditBook');

    Route::get('/view-book-form', 'BookController@viewFormCreateBook');
    Route::post('/create-book', 'BookController@submitFormCreateBook');

    Route::get('/listening', 'BookController@viewListening');
    Route::get('/delete-book', 'BookController@deleteBook')->name('delete.book');
    Route::get('/view-create-book', 'BookController@viewCreateBook')->name('book.list');

    /*แก้ไขหนังสือ*/
    Route::get('/view-edit-form', 'BookController@viewFormEditBook')->name('edit');
    Route::post('/edit-book','BookController@updateEditBook');

    /*ลบหนังสือ*/
    Route::get('/delete-book','BookController@deleteBook')->name('delete.book');

    /*จัดการข้อมูลหนังสือ*/
    Route::get('/view-book-list','BookController@viewBookList')->name('home.view-book-list');

    /*จัดการเสียง*/
    Route::get('/view-audio-list','DemoController@viewAudioList')->name('home.view-audio-list');
    Route::get('/view-verify-audio','DemoController@viewVerifyAudio')->name('verify-audio');





    /*บันทึกเสียงที่อัด*/
    Route::post('/create-audio', 'UploadSoundController@uploadAudioPath');


//upload sounds
    Route::group(['prefix' => 'view-new-record'], function () {
        Route::get('/', 'BookController@recordAudio')->name('view.book.record.sound');
        Route::post('/upload', 'UploadSoundController@uploadAudioPath')->name('submit.upload.sound');
    });


    Route::get('/view-listener-rec', 'UploadSoundController@viewRecordListener');


    Route::get('recorder', function () {
        return view('recorder.index');
    });

});

Route::get('view-blind-d', 'BookController@switchModes')->name('home.view-blind-d');


Route::get('facebook', 'facebookController@facebookLogin');
Route::get('callback-url', 'facebookController@callBack');


Route::get('facebook', 'facebookController@facebookLogin');
Route::get('callback-url', 'facebookController@callBack');


Route::get('login/facebook', 'Auth\FacebookLoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\FacebookLoginController@handleProviderCallback');

Route::get('login/google', 'Auth\GoogleLoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\GoogleLoginController@handleProviderCallback');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search','BookController@search');

Route::get('/view-book-category/ท่องเที่ยว','BookController@viewCategory');

