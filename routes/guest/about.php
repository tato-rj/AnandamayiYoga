<?php

Route::namespace('Guests')->prefix('/about')->name('about.')->group(function() {

    Route::get('/our-platform', 'PagesController@platform')->name('our-platform');

    Route::get('/anandamayi', 'PagesController@anandamayi')->name('anandamayi');

});
