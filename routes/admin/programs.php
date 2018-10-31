<?php

Route::prefix('/programs')->name('programs.')->group(function() {

    Route::get('', 'Admin\OfficeController@programs')->name('index');

    Route::get('/{program}', 'Classes\ProgramsController@edit')->name('edit');

    Route::post('', 'Classes\ProgramsController@store')->name('store');

    Route::post('/validate', 'Classes\ProgramsController@checkTitle')->name('lookup');

    Route::patch('/{program}', 'Classes\ProgramsController@update')->name('update');

    Route::patch('/{program}/image', 'Classes\ProgramsController@updateImage')->name('image.update');

    Route::patch('/{program}/video', 'Classes\ProgramsController@updateVideo')->name('video.update');

    Route::patch('/{program}/lessons', 'Classes\ProgramsController@updateLessons')->name('lessons.update');

    Route::patch('/{program}/categories', 'Classes\ProgramsController@updateCategories')->name('categories.update');

    Route::delete('/{program}', 'Classes\ProgramsController@destroy')->name('destroy');

});
