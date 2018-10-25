<?php

Route::prefix('/courses')->name('courses.')->group(function() {

    Route::prefix('/{course}/chapters')->name('chapters.')->group(function() {

        Route::get('', 'ChaptersController@manage')->name('manage');

        Route::post('', 'ChaptersController@store')->name('store');

        Route::prefix('/{chapter}/materials')->name('materials.')->group(function() {
    
            Route::post('', 'SupportingMaterialsController@store')->name('store');

            Route::delete('/{material}', 'SupportingMaterialsController@destroy')->name('destroy');
    
        });

        Route::patch('/{chapter}', 'ChaptersController@update')->name('update');

        Route::patch('/{chapter}/quiz/{quiz}', 'QuizzesController@update')->name('quiz.update');

        Route::prefix('/{chapter}/content')->name('content.')->group(function() {

            Route::post('', 'ChaptersController@createContent')->name('create');

            Route::patch('/{name}/{id}', 'ChaptersController@updateContent')->name('update');

            Route::patch('/{name}/{id}/video', 'ChaptersController@updateVideo')->name('video.update');

            Route::delete('', 'ChaptersController@deleteContent')->name('delete');

        });

        Route::delete('/{chapter}', 'ChaptersController@destroy')->name('destroy');

    });

    Route::get('', 'OfficeController@courses')->name('index');

    Route::get('/{course}', 'CoursesController@edit')->name('edit');

    Route::post('', 'CoursesController@store')->name('store');

    Route::patch('/{courseId}', 'CoursesController@update')->name('update');

    Route::patch('/{courseId}/status', 'CoursesController@status')->name('status');

    Route::patch('/{courseId}/teachers', 'CoursesController@updateTeachers')->name('teachers.update');

    Route::patch('/{course}/image', 'CoursesController@updateImage')->name('image.update');

    Route::patch('/{course}/video', 'CoursesController@updateVideo')->name('video.update');

    Route::delete('/{course}', 'CoursesController@destroy')->name('destroy');

});
