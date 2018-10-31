<?php

Route::prefix('/my-yoga-routine')->namespace('Routines')->name('routine.')->group(function() {

    Route::get('/instructions', function() {
        return view('pages/user/routine/instructions/index');
    })->name('instructions');

    Route::get('/questionaire', 'RoutineQuestionairesController@form')->name('form');

    Route::get('/{routine}/{lesson}', 'RoutinesController@show')->name('show');

    Route::post('', 'RoutineQuestionairesController@store')->name('store');

    Route::post('/{routine}/complete', 'RoutinesController@complete')->name('complete');
});
