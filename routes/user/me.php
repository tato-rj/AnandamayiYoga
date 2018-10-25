<?php

Route::prefix('/me')->group(function() {

    Route::get('', 'HomeController@index')->name('home');

    Route::get('/favorites', 'FavoritesController@index')->name('favorites');

    Route::get('/recommended', 'RecommendedLessonsController@index')->name('recommended');

    Route::get('/courses', 'UsersController@courses')->name('courses');

    Route::post('/avatar', 'AvatarController@store')->name('avatar.store');

    Route::post('/delete', 'UsersController@destroy')->name('delete');

});
