<?php

Route::get('/images/', 'ImageController@index')->name('render.img');
Route::get('/image/test', 'ImageController@testView')->name('render.test');



