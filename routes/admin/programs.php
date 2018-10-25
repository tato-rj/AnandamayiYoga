<?php

Route::prefix('/programs')->name('programs.')->group(function() {

    Route::get('', 'OfficeController@programs')->name('index');

    Route::get('/{program}', 'ProgramsController@edit')->name('edit');

    Route::post('', 'ProgramsController@store')->name('store');

    Route::post('/validate', 'ProgramsController@checkTitle')->name('lookup');

    Route::patch('/{program}', 'ProgramsController@update')->name('update');

    Route::patch('/{program}/image', 'ProgramsController@updateImage')->name('image.update');

    Route::patch('/{program}/video', 'ProgramsController@updateVideo')->name('video.update');

    Route::patch('/{program}/lessons', 'ProgramsController@updateLessons')->name('lessons.update');

    Route::patch('/{program}/categories', 'ProgramsController@updateCategories')->name('categories.update');

    Route::delete('/{program}', 'ProgramsController@destroy')->name('destroy');

});
