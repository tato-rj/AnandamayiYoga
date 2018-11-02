<?php

Route::prefix('/mail')->namespace('Admin')->name('email.')->group(function() {

    Route::get('/mail', 'AdminController@createMail')->name('create');

    Route::post('/mail', 'AdminController@sendMail')->name('send');

});
