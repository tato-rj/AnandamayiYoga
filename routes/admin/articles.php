<?php

Route::prefix('/reads')->name('articles.')->group(function() {

    Route::prefix('/topics')->name('topics.')->group(function() {

        Route::get('', 'Admin\AdminController@articleTopics')->name('index');

        Route::post('', 'Reads\ArticleTopicsController@store')->name('store');

        Route::patch('/{topic}', 'Reads\ArticleTopicsController@update')->name('update');

        Route::delete('/{topicId}', 'Reads\ArticleTopicsController@destroy')->name('destroy');

    });

    Route::get('/learning', 'Admin\AdminController@learning')->name('learning');

    Route::get('/articles', 'Admin\AdminController@articles')->name('articles');

    Route::get('/create', 'Reads\ArticlesController@create')->name('create');

    Route::get('/{article}', 'Reads\ArticlesController@edit')->name('edit');

    Route::post('', 'Reads\ArticlesController@store')->name('store');

    Route::post('/validate', 'Reads\ArticlesController@checkTitle')->name('lookup');

    Route::patch('/{article}', 'Reads\ArticlesController@update')->name('update');

    Route::patch('/{article}/topics', 'Reads\ArticlesController@updateTopics')->name('update-topics');

    Route::patch('/{article}/image', 'Reads\ArticlesController@updateImage')->name('image.update');
    
    Route::delete('/{article}', 'Reads\ArticlesController@destroy')->name('destroy');

});
