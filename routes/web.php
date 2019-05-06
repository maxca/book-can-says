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

Route::get('/welcome', 'JammController@welcome');
Route::get('/pim', 'PimController@welcome');
Route::get('/index', 'PimController@viewIndex');
Route::get('/view-recorder', 'PimController@viewRecorder');
Route::get('/view-book', 'PimController@viewBook');


Route::get('recorder', function () {
    return view('recorder.index');
});

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