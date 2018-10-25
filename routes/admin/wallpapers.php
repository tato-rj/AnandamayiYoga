<?php

Route::prefix('/wallpapers')->name('wallpapers.')->group(function() {

    Route::get('/category/{category}', 'WallpapersController@create')->name('create');

    Route::post('', 'WallpapersController@store')->name('store');

    Route::delete('/{wallpaper}', 'WallpapersController@destroy')->name('destroy');

});
