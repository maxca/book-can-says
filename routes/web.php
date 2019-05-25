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

Route::get('/view-book-form','BookController@viewFormCreateBook');
Route::get('/create-book','BookController@ViewCreateBook');
Route::post('/create-book','BookController@submitFormCreateBook');

Route::get('/view-book','PimController@viewBook');
Route::get('/welcome','JammController@welcome');

Route::get('view-new-record','BookController@recordAudio');



Route::get('recorder', function () {
    return view('recorder.index');
});


Route::get('facebook','facebookController@facebookLogin');
Route::get('callback-url','facebookController@callBack');


//=======
Route::group(['prefix' => 'recorder'], function () {
    Route::get('/', 'UploadSoundController@index');
    Route::post('/upload', 'UploadSoundController@upload');
});

Route::get('facebook', 'facebookController@facebookLogin');
Route::get('callback-url', 'facebookController@callBack');


# social login
Route::get('login/facebook', 'Auth\FacebookLoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\FacebookLoginController@handleProviderCallback');

Route::get('login/google', 'Auth\GoogleLoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\GoogleLoginController@handleProviderCallback');
<<<<<<< HEAD


//>>>>>>> 33058088df6f9f6342d1e81b22d643cfa45b0481
//>>>>>>> dba1f46ffa85ef309e2e547efd306d0d216ced9b
=======
>>>>>>> 10d2e60969e5b1fab31ba7e5ac30dab5da84103d
