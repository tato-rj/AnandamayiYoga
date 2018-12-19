<?php

Route::prefix('reads')->name('reads.')->group(function() {

    Route::get('/books', 'Reads\BooksController@index')->name('books');

    Route::namespace('Reads')->prefix('articles')->name('articles.')->group(function() {

        Route::get('/about/{topic}', 'ArticlesController@index')->name('index');

        Route::get('/{article}', 'ArticlesController@show')->name('show');

    });
});
