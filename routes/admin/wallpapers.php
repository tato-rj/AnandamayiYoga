<?php

Route::prefix('/wallpapers')->namespace('Downloads')->name('wallpapers.')->group(function() {

    Route::get('', 'WallpapersController@create')->name('create');

    Route::get('/{category}', 'WallpapersController@show')->name('show');

    Route::post('/categories', 'WallpapersController@categoryStore')->name('categories.store');

    Route::get('/categories/{category}', 'WallpapersController@categoryEdit')->name('categories.edit');

    Route::patch('/categories/{category}', 'WallpapersController@categoryUpdate')->name('categories.update');

    Route::patch('/categories/{category}', 'WallpapersController@categorySort')->name('categories.sort');

    Route::delete('/categories/{category}', 'WallpapersController@categoryDestroy')->name('categories.destroy');

    Route::post('', 'WallpapersController@store')->name('store');

    Route::delete('/{wallpaper}', 'WallpapersController@destroy')->name('destroy');

});
