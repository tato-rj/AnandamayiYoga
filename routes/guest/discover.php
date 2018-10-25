<?php

Route::prefix('/discover')->name('discover.')->group(function() {

    Route::get('/browse', function () {

        return view('pages/discover/browse/index');

    })->name('browse');

    Route::get('/categories/{category}', 'CategoriesController@show')->name('category');

    Route::prefix('/programs')->name('programs.')->group(function() {

        Route::get('', 'ProgramsController@index')->name('index');

        Route::get('/{program}', 'ProgramsController@show')->name('show');

        Route::get('/{program}/{lesson}', 'ProgramsController@lesson')->name('lesson');

        Route::post('/{program}/completed', 'CompletedProgramsController@store')
            ->name('record-completed-program')
            ->middleware(['auth', 'email-confirmed']);

    });

    Route::prefix('/classes')->name('classes.')->group(function() {
    
        Route::get('', 'LessonsController@index')->name('index');
    
        Route::get('/{lesson}', 'LessonsController@show')->name('show');

        Route::post('/{lesson}/completed', 'CompletedLessonsController@store')
            ->name('record-view')
            ->middleware(['auth', 'email-confirmed']);
    });

    Route::prefix('/asanas')->name('asanas.')->group(function() {

        Route::get('', 'AsanasController@index')->name('index');
    
        Route::get('asanas/{asana}', 'AsanasController@show')->name('show');

    });

    Route::get('/yoga-wallpapers', 'WallpapersController@index')->name('wallpapers');
 
});
