<?php

Route::prefix('/classes')->namespace('Classes')->name('classes.')->group(function() {

    Route::get('', 'LessonsController@admin')->name('index');

    Route::get('/{lesson}', 'LessonsController@edit')->name('edit');

    Route::post('', 'LessonsController@store')->name('store');

    Route::post('/validate', 'LessonsController@checkTitle')->name('lookup');

    Route::patch('/{lesson}', 'LessonsController@update')->name('update');

    Route::patch('/{lesson}/image', 'LessonsController@updateImage')->name('image.update');

    Route::patch('/{lesson}/video', 'LessonsController@updateVideo')->name('video.update');

    Route::patch('/{lesson}/categories', 'LessonsController@updateCategories')->name('categories.update');

    Route::patch('/{lesson}/levels', 'LessonsController@updateLevels')->name('levels.update');

    Route::delete('/{lesson}', 'LessonsController@destroy')->name('destroy');

});
