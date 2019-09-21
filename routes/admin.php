<?php

Route::group(['prefix' => 'admin'], function ($router) {
    $router->get('/books', 'AdminController@viewBooks');
    $router->post('/book/{id}', 'AdminController@updateBook')->name('admin.update.book');

});