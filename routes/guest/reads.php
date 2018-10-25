<?php

Route::prefix('/reads')->name('reads.')->group(function() {

    Route::get('/books', function () {

        return view('pages/reads/books/index');

    })->name('books');

    Route::prefix('/articles')->name('articles.')->group(function() {

        Route::get('', 'ArticlesController@index')->name('index');

        Route::get('/{article}', 'ArticlesController@show')->name('show');

    });

    Route::namespace('Reads')->prefix('learning-about-yoga')->name('learning.')->group(function() {

        Route::get('/', 'LearningAboutYogaController@index')->name('index');
        
        Route::get('/{section}/{article}', 'LearningAboutYogaController@show')->name('show');

    });

});
