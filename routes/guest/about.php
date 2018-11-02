<?php

Route::namespace('Guests')->prefix('/about')->name('about.')->group(function() {

    Route::get('/our-platform', 'PagesController@platform')->name('our-platform');

    Route::get('/ali-anandamayi', 'PagesController@anandamayi')->name('ali-anandamayi');

    Route::get('/eranthus-books', 'PagesController@eranthus')->name('eranthus-books');

});
