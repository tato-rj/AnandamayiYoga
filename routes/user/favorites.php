<?php

Route::prefix('/favorites')->namespace('Users')->name('favorite.')->group(function() {

    Route::post('', 'FavoritesController@store')->name('store');

    Route::delete('', 'FavoritesController@destroy')->name('destroy');

});
