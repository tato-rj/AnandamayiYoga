<?php

Route::prefix('/courses')->name('courses.')->group(function() {

    Route::prefix('/{course}/chapters')->name('chapters.')->group(function() {

        Route::get('', 'Courses\ChaptersController@manage')->name('manage');

        Route::post('', 'Courses\ChaptersController@store')->name('store');

        Route::prefix('/{chapter}/materials')->name('materials.')->group(function() {
    
            Route::post('', 'Courses\SupportingMaterialsController@store')->name('store');

            Route::delete('/{material}', 'Courses\SupportingMaterialsController@destroy')->name('destroy');
    
        });

        Route::patch('/{chapter}', 'Courses\ChaptersController@update')->name('update');

        Route::patch('/{chapter}/quiz/{quiz}', 'Courses\QuizzesController@update')->name('quiz.update');

        Route::prefix('/{chapter}/content')->name('content.')->group(function() {

            Route::post('', 'Courses\ChaptersController@createContent')->name('create');

            Route::patch('/{name}/{id}', 'Courses\ChaptersController@updateContent')->name('update');

            Route::patch('/{name}/{id}/video', 'Courses\ChaptersController@updateVideo')->name('video.update');

            Route::delete('', 'Courses\ChaptersController@deleteContent')->name('delete');

        });

        Route::delete('/{chapter}', 'Courses\ChaptersController@destroy')->name('destroy');

    });

    Route::get('', 'Admin\OfficeController@courses')->name('index');

    Route::get('/{course}', 'Courses\CoursesController@edit')->name('edit');

    Route::post('', 'Courses\CoursesController@store')->name('store');

    Route::patch('/{courseId}', 'Courses\CoursesController@update')->name('update');

    Route::patch('/{courseId}/status', 'Courses\CoursesController@status')->name('status');

    Route::patch('/{courseId}/teachers', 'Courses\CoursesController@updateTeachers')->name('teachers.update');

    Route::patch('/{course}/image', 'Courses\CoursesController@updateImage')->name('image.update');

    Route::patch('/{course}/video', 'Courses\CoursesController@updateVideo')->name('video.update');

    Route::delete('/{course}', 'Courses\CoursesController@destroy')->name('destroy');

});
