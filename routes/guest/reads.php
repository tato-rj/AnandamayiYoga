<?php

Route::prefix('reads')->name('reads.')->group(function() {

    Route::get('/books', 'Reads\BooksController@index')->name('books');

    Route::namespace('Reads')->prefix('articles')->name('articles.')->group(function() {

        Route::get('', 'BlogController@index')->name('index');

        Route::get('/{article}', 'BlogController@show')->name('show');

    });

    Route::namespace('Reads')->prefix('learning-about-yoga')->name('learning.')->group(function() {
            
        Route::prefix('{subject}')->group(function() {

            Route::get('', 'LearningAboutYogaController@index')->name('index');

            Route::get('/{article}', 'LearningAboutYogaController@show')->name('show');

        });

    });

});
