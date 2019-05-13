<?php

Route::prefix('/discover')->name('discover.')->group(function() {

    Route::get('/browse', 'Classes\LessonsController@browse')->name('browse');

    Route::get('/categories/{category}', 'Classes\CategoriesController@show')->name('category');

    Route::prefix('/programs')->name('programs.')->group(function() {

        Route::get('', 'Classes\ProgramsController@index')->name('index');

        Route::get('/{program}', 'Classes\ProgramsController@show')->name('show');

        Route::get('/{program}/{lesson}', 'Classes\ProgramsController@lesson')->name('lesson');

        Route::post('/{program}/completed', 'Classes\CompletedProgramsController@store')
            ->name('record-completed-program')
            ->middleware(['auth', 'email-confirmed']);

    });

    Route::prefix('/classes')->name('classes.')->group(function() {
    
        Route::get('', 'Classes\LessonsController@index')->name('index');
    
        Route::get('/{lesson}', 'Classes\LessonsController@show')->name('show');

        Route::post('/{lesson}/completed', 'Classes\CompletedLessonsController@store')
            ->name('record-view')
            ->middleware(['auth', 'email-confirmed']);
    });

    Route::prefix('/asanas')->namespace('Asanas')->name('asanas.')->group(function() {

        Route::get('', 'AsanasController@index')->name('index');
    
        Route::get('asanas/{asana}', 'AsanasController@show')->name('show');

    });

    Route::get('/yoga-wallpapers', 'Downloads\WallpapersController@index')->name('wallpapers');
 
});
