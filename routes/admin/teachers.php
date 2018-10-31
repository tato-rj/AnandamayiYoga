<?php

Route::prefix('/teachers')->namespace('Admin')->name('teachers.')->group(function() {

    Route::get('', 'OfficeController@teachers')->name('index');

    Route::get('/create', 'TeachersController@create')->name('create');

    Route::get('/{teacher}', 'TeachersController@edit')->name('edit');

    Route::post('', 'TeachersController@store')->name('store');

    Route::patch('/{teacherId}', 'TeachersController@update')->name('update');

    Route::patch('/{teacher}/categories', 'TeachersController@updateCategories')->name('categories.update');

    Route::patch('/{teacher}/image', 'TeachersController@updateImage')->name('image.update');

    Route::patch('/{teacher}/cover', 'TeachersController@updateCover')->name('cover.update');

    Route::delete('/{teacher}', 'OfficeController@destroyTeacher')->name('destroy');

});
