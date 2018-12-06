<?php

Route::prefix('/teachers')->namespace('Admin')->name('teachers.')->group(function() {

    Route::get('', 'AdminController@teachers')->name('index');

    Route::get('/create', 'TeachersController@create')->name('create');

    Route::get('/{teacher}', 'TeachersController@edit')->name('edit');

    Route::post('', 'TeachersController@store')->name('store');

    Route::patch('/{teacherId}', 'TeachersController@update')->name('update');

    Route::patch('/{teacher}/categories', 'TeachersController@updateCategories')->name('categories.update');

    Route::patch('/{teacher}/image', 'TeachersController@updateImage')->name('image.update');

    Route::patch('/{teacher}/cover', 'TeachersController@updateCover')->name('cover.update');

    Route::delete('/{teacher}', 'AdminController@destroyTeacher')->name('destroy');

    Route::prefix('/questionaire')->name('questionaire.')->group(function() {

    	Route::post('', 'TeacherQuestionairesController@store')->name('store');

    	Route::patch('/{questionaire}', 'TeacherQuestionairesController@update')->name('update');
	
	    Route::delete('/{questionaire}', 'TeacherQuestionairesController@destroy')->name('destroy');

    });

});
