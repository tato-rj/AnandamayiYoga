<?php

Route::name('update.')->group(function() {

    Route::post('', 'UsersController@update')->name('all');
    
    Route::post('/categories/{category}', 'UsersController@updateCategory')->name('category');

    Route::post('/levels/{level}', 'UsersController@updateLevel')->name('level');

});
