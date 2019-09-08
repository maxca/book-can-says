<?php

Route::get('/images/', 'ImageController@index')->name('render.img');
Route::get('/image/test', 'ImageController@testView')->name('render.test');

Route::get('/has-many', 'SimpleController@testRenderViewViaHasMany')->name('render.hasmany');


Route::get('/test/record', 'SimpleController@testRecord')->name('render.record');
Route::post('test/recorder/upload', 'SimpleController@upload')->name('render.upload');


