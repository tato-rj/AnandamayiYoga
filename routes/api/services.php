<?php

Route::get('/user/{user}/invoice/{payment}', 'Billing\PdfController@invoice')->name('user.invoice')->middleware('auth:open,manager');

Route::post('/articles/image/upload', 'Reads\ArticlesController@uploadImage')->name('image.upload');

Route::post('/articles/image/remove', 'Reads\ArticlesController@removeImage')->name('image.remove');
