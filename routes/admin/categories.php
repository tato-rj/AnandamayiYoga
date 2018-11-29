<?php

Route::prefix('/categories')->namespace('Classes')->name('categories.')->group(function() {

    Route::get('', 'CategoriesController@admin')->name('index');

    Route::get('/create', 'CategoriesController@create')->name('create');

    Route::post('', 'CategoriesController@store')->name('store');

    Route::get('/{category}', 'CategoriesController@edit')->name('edit');

    Route::patch('/{category}', 'CategoriesController@update')->name('update');

    Route::delete('/{category}', 'CategoriesController@destroy')->name('destroy');

});
