<?php

Route::prefix('/asanas')->name('asanas.')->group(function() {

    Route::get('', 'Admin\AdminController@asanas')->name('index');

    Route::get('/{asana}', 'Asanas\AsanasController@edit')->name('edit');

    Route::post('', 'Asanas\AsanasController@store')->name('store');

    Route::post('/validate', 'Asanas\AsanasController@checkTitle')->name('lookup');

    Route::patch('/{asana}', 'Asanas\AsanasController@update')->name('update');

    Route::patch('/{asana}/image', 'Asanas\AsanasController@updateImage')->name('image.update');

    Route::patch('/{asana}/video', 'Asanas\AsanasController@updateVideo')->name('video.update');

    Route::patch('/{asana}/types', 'Asanas\AsanasController@updateTypes')->name('update-type');

    Route::patch('/{asana}/subtypes', 'Asanas\AsanasController@updateSubTypes')->name('update-subtype');

    Route::patch('/{asana}/benefits', 'Asanas\AsanasController@updateBenefits')->name('benefits.update');

    Route::patch('/{asana}/steps', 'Asanas\AsanasController@updateSteps')->name('steps.update');

    Route::patch('/{asana}/levels', 'Asanas\AsanasController@updateLevels')->name('levels.update');

    Route::delete('/{asana}', 'Asanas\AsanasController@destroy')->name('destroy');

});

Route::prefix('/asana-types')->name('asanas.types.')->group(function() {

    Route::get('', 'Admin\AdminController@asanaTypes')->name('index');

    Route::post('', 'Asanas\AsanaTypesController@store')->name('store');

    Route::patch('/{asanatype}', 'Asanas\AsanaTypesController@update')->name('update');

    Route::delete('/{asanatype}', 'Asanas\AsanaTypesController@destroy')->name('destroy');
});

Route::prefix('/asana-subtypes')->name('asanas.subtypes.')->group(function() {

    Route::get('', 'Admin\AdminController@asanaSubtypes')->name('index');

    Route::post('', 'Asanas\AsanaSubTypesController@store')->name('store');

    Route::patch('/{asanaSubtype}', 'Asanas\AsanaSubTypesController@update')->name('update');

    Route::delete('/{asanaSubtype}', 'Asanas\AsanaSubTypesController@destroy')->name('destroy');

});
