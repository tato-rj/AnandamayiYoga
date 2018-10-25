<?php

Route::prefix('/asanas')->name('asanas.')->group(function() {

    Route::get('', 'OfficeController@asanas')->name('index');

    Route::get('/{asana}', 'AsanasController@edit')->name('edit');

    Route::post('', 'AsanasController@store')->name('store');

    Route::post('/validate', 'AsanasController@checkTitle')->name('lookup');

    Route::patch('/{asana}', 'AsanasController@update')->name('update');

    Route::patch('/{asana}/image', 'AsanasController@updateImage')->name('image.update');

    Route::patch('/{asana}/video', 'AsanasController@updateVideo')->name('video.update');

    Route::patch('/{asana}/types', 'AsanasController@updateTypes')->name('update-type');

    Route::patch('/{asana}/subtypes', 'AsanasController@updateSubTypes')->name('update-subtype');

    Route::patch('/{asana}/benefits', 'AsanasController@updateBenefits')->name('benefits.update');

    Route::patch('/{asana}/steps', 'AsanasController@updateSteps')->name('steps.update');

    Route::patch('/{asana}/levels', 'AsanasController@updateLevels')->name('levels.update');

    Route::delete('/{asana}', 'AsanasController@destroy')->name('destroy');

});

Route::prefix('/asana-types')->name('asanas.types.')->group(function() {

    Route::get('', 'OfficeController@asanaTypes')->name('index');

    Route::post('', 'AsanaTypesController@store')->name('store');

    Route::patch('/{asanatype}', 'AsanaTypesController@update')->name('update');

    Route::delete('/{asanatype}', 'AsanaTypesController@destroy')->name('destroy');
});

Route::prefix('/asana-subtypes')->name('asanas.subtypes.')->group(function() {

    Route::get('', 'OfficeController@asanaSubtypes')->name('index');

    Route::post('', 'AsanaSubTypesController@store')->name('store');

    Route::patch('/{asanaSubtype}', 'AsanaSubTypesController@update')->name('update');

    Route::delete('/{asanaSubtype}', 'AsanaSubTypesController@destroy')->name('destroy');

});
