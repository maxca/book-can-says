<?php

Route::get('/render/images/', 'ImageController@index')->name('render.img');
Route::get('/sound', 'ImageController@index')->name('get.sound');
Route::get('/render/download/', 'ImageController@download')->name('render.download');
Route::get('/render/preview/', 'ImageController@preview')->name('render.preview');
Route::get('/image/test', 'ImageController@testView')->name('render.test');

Route::get('/has-many', 'SimpleController@testRenderViewViaHasMany')->name('render.hasmany');


Route::get('/test/record', 'SimpleController@testRecord')->name('render.record');
Route::post('test/recorder/upload', 'SimpleController@upload')->name('render.upload');


Route::group(['prefix' => 'demo/book'], function ($router) {
    $router->get('/','DemoController@viewBooks');
    $router->get('/{id}','DemoController@viewBookDetail')->name('show.book.detail');
    $router->get('/category/{category_id}','DemoController@viewBookCategory');
    $router->get('/play-sound','DemoController@playSoundBook');
    $router->get('/review','DemoController@reviewBook');
});

Route::get('/test-player', 'DemoController@testPlayer')->name('demo.testPlayer');
