<?php

Route::prefix('/favorites')->name('favorite.')->group(function() {

    Route::post('', 'FavoritesController@store')->name('store');

    Route::delete('', 'FavoritesController@destroy')->name('destroy');

});
