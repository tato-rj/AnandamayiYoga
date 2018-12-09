<?php

Route::prefix('/teachers')->namespace('Admin')->name('teachers.')->group(function() {

    Route::get('', 'AdminController@teachers')->name('index');

    Route::get('/create', 'TeachersController@create')->name('create');

    Route::get('/questionaire', 'TeacherQuestionairesController@index')->name('questionaire');

    Route::get('/{teacher}', 'TeachersController@edit')->name('edit');

    Route::post('', 'TeachersController@store')->name('store');

    Route::patch('/{teacherId}', 'TeachersController@update')->name('update');

    Route::patch('/{teacher}/categories', 'TeachersController@updateCategories')->name('categories.update');

    Route::patch('/{teacher}/image', 'TeachersController@updateImage')->name('image.update');

    Route::patch('/{teacher}/cover', 'TeachersController@updateCover')->name('cover.update');

    Route::delete('/{teacher}', 'AdminController@destroyTeacher')->name('destroy');

    Route::prefix('/{teacher}/questionaire')->name('questionaire.')->group(function() {

        Route::get('/show', 'TeacherQuestionairesController@show')->name('show');

        Route::get('/create', 'TeacherQuestionairesController@create')->name('create');

        Route::get('/edit', 'TeacherQuestionairesController@edit')->name('edit');

    	Route::post('', 'TeacherQuestionairesController@store')->name('store');

    	Route::patch('/{questionaire}', 'TeacherQuestionairesController@update')->name('update');

        Route::patch('/{questionaire}/status', 'TeacherQuestionairesController@status')->name('status');
	
	    Route::delete('/{questionaire}', 'TeacherQuestionairesController@destroy')->name('destroy');

    });

});
