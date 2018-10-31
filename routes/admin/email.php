<?php

Route::prefix('/mail')->namespace('Admin')->name('email.')->group(function() {

    Route::get('/mail', 'OfficeController@createMail')->name('create');

    Route::post('/mail', 'OfficeController@sendMail')->name('send');

});
