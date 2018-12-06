<?php

Route::prefix('/mail')->namespace('Admin')->name('email.')->group(function() {

    Route::get('', 'AdminController@createMail')->name('create');

    Route::post('', 'AdminController@sendMail')->name('send');

});
