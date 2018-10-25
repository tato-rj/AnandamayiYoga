<?php

Route::prefix('/mail')->name('email.')->group(function() {

    Route::get('/mail', 'OfficeController@createMail')->name('create');

    Route::post('/mail', 'OfficeController@sendMail')->name('send');

});
