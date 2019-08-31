<?php

Route::get('/images/', 'ImageController@index')->name('render.img');
Route::get('/image/test', 'ImageController@testView')->name('render.test');

Route::get('/has-many', 'SimpleController@testRenderViewViaHasMany')->name('render.hasmany');
Route::get('/has-one', 'SimpleController@testRenderViewViaHasOne')->name('render.hasone');



