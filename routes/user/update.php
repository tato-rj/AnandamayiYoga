<?php

Route::name('update.')->group(function() {

    Route::post('', 'Users\UsersController@update')->name('all');
    
    Route::post('/categories/{category}', 'Users\UsersController@updateCategory')->name('category');

    Route::post('/levels/{level}', 'Users\UsersController@updateLevel')->name('level');

});
