<?php

Route::prefix('/reads')->name('reads.')->group(function() {

    Route::prefix('/topics')->name('topics.')->group(function() {

        Route::get('', 'Admin\AdminController@articleTopics')->name('index');

        Route::post('', 'Reads\ArticleTopicsController@store')->name('store');

        Route::patch('/{topic}', 'Reads\ArticleTopicsController@update')->name('update');

        Route::delete('/{topicId}', 'Reads\ArticleTopicsController@destroy')->name('destroy');

    });

    Route::prefix('/articles')->name('articles.')->group(function() {

        Route::get('', 'Admin\AdminController@articles')->name('index');

        Route::get('/create', 'Reads\ArticlesController@create')->name('create');

        Route::get('/{article}', 'Reads\ArticlesController@edit')->name('edit');

        Route::post('', 'Reads\ArticlesController@store')->name('store');

        Route::post('/validate', 'Reads\ArticlesController@checkTitle')->name('lookup');

        Route::patch('/{article}', 'Reads\ArticlesController@update')->name('update');

        Route::patch('/{article}/topics', 'Reads\ArticlesController@updateTopics')->name('topics.update');

        Route::patch('/{article}/image', 'Reads\ArticlesController@updateImage')->name('image.update');
        
        Route::delete('/{article}', 'Reads\ArticlesController@destroy')->name('destroy');
        
    });

    Route::prefix('/books')->namespace('Reads')->name('books.')->group(function() {

        Route::get('', 'BooksController@admin')->name('admin');

        Route::get('create', 'BooksController@create')->name('create');

        Route::get('{book}', 'BooksController@edit')->name('edit');

        Route::patch('{book}', 'BooksController@update')->name('update');

        Route::patch('/{book}/image', 'BooksController@updateImage')->name('image.update');

        Route::post('', 'BooksController@store')->name('store');

        Route::delete('{book}', 'BooksController@destroy')->name('destroy');

    });
});
