<?php

Route::prefix('/me')->group(function() {

    Route::get('', 'Users\UsersController@index')->name('home');

    Route::get('/favorites', 'Users\FavoritesController@index')->name('favorites');

    Route::get('/recommended', 'Classes\RecommendedLessonsController@index')->name('recommended');

    Route::get('/courses', 'Users\UsersController@courses')->name('courses');

    Route::post('/avatar', 'Users\AvatarController@store')->name('avatar.store');

    Route::post('/delete', 'Users\UsersController@destroy')->name('delete');

});
