<?php

Route::prefix('/my-yoga-routine')->namespace('Routines')->name('routine.')->group(function() {

    Route::get('/instructions', 'RoutineQuestionairesController@instructions')->name('instructions');

    Route::get('/questionaire', 'RoutineQuestionairesController@form')->name('form');

    Route::get('/{routine}/{lesson}', 'RoutinesController@show')->name('show');

    Route::post('', 'RoutineQuestionairesController@store')->name('store');

    Route::post('/{routine}/complete', 'RoutinesController@complete')->name('complete');
});
