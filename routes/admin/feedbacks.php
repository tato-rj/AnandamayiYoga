<?php

Route::prefix('/feedbacks')->namespace('Users')->name('feedbacks.')->group(function() {

    Route::get('', 'FeedbacksController@index')->name('index');

    Route::get('/{feedback}', 'FeedbacksController@show')->name('show');

    Route::delete('/{feedback}', 'FeedbacksController@destroy')->name('destroy');

});
