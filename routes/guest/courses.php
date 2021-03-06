<?php

Route::prefix('/courses')->namespace('Courses')->name('courses.')->group(function() {

    Route::get('', 'CoursesController@index')->name('index');

    Route::get('/{course}', 'CoursesController@show')->name('show');

    Route::get('/{course}/purchase', 'CoursesController@purchase')->name('purchase');

});
