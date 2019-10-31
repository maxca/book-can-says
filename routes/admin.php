<?php

Route::group(['prefix' => 'admin'], function ($router) {
    $router->get('/books', 'AdminController@viewBooks')->name('admin.books');
    $router->post('/book/{id}', 'AdminController@updateBook')->name('admin.update.book');


});

/*จัดการเสียง*/
Route::group(['prefix' => 'admin'], function ($router) {
    $router->get('/view-verify-audio', 'DemoController@viewVerifyAudio')->name('verify-audio');
    $router->post('/audio/{id}', 'AdminController@updateAudio')->name('admin.update.audio');
});