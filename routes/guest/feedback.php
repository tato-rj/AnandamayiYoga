<?php

Route::prefix('/feedback')->name('feedback.')->group(function() {

    Route::get('goodbye', 'Guests\PagesController@goodbye')->name('delete');
    
    Route::post('/store', 'Users\FeedbacksController@store')->name('store')->middleware('throttle:2');

});
