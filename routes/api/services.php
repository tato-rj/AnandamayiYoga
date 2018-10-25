<?php

Route::get('/user/{user}/invoice/{payment}', 'PdfController@invoice')->name('user.invoice')->middleware('auth:open,manager');

Route::post('/articles/image/upload', 'ArticlesController@uploadImage')->name('image.upload');
Route::post('/articles/image/remove', 'ArticlesController@removeImage')->name('image.remove');
