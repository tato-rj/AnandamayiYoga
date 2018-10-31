<?php

Route::prefix('/routines')->namespace('Routines')->name('routines.')->group(function() {

    Route::get('/pending', 'RoutineQuestionairesController@index')->name('pending');

    Route::get('/active', 'RoutinesController@index')->name('active');

    Route::get('/{request}/create', 'RoutineQuestionairesController@create')->name('create');

    Route::get('/{routine}/edit', 'RoutinesController@edit')->name('edit');

    Route::post('', 'RoutinesController@store')->name('store');

    Route::patch('/{routine}', 'RoutinesController@update')->name('update');

    Route::patch('/{routine}/video', 'RoutinesController@updateVideo')->name('video.update');

    Route::patch('/{routine}/schedule', 'RoutinesController@updateSchedule')->name('schedule.update');

    Route::delete('/{routine}', 'RoutinesController@destroy')->name('destroy');

});
