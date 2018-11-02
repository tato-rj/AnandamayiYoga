<?php

Route::prefix('/categories')->namespace('Classes')->name('categories.')->group(function() {

    Route::get('', 'CategoriesController@admin')->name('index');

    Route::post('', 'CategoriesController@store')->name('store');

    Route::patch('/{category}', 'CategoriesController@update')->name('update');

    Route::delete('/{category}', 'CategoriesController@destroy')->name('destroy');

});
