<?php

Route::prefix('/articles')->name('articles.')->group(function() {

    Route::prefix('/topics')->name('topics.')->group(function() {

        Route::get('', 'Admin\OfficeController@articleTopics')->name('index');

        Route::post('', 'Reads\ArticleTopicsController@store')->name('store');

        Route::patch('/{topic}', 'Reads\ArticleTopicsController@update')->name('update');

        Route::delete('/{topic}', 'Reads\ArticleTopicsController@destroy')->name('destroy');

    });

    Route::get('', 'Admin\OfficeController@articles')->name('index');

    Route::get('/blog', 'Admin\OfficeController@blog')->name('blog');

    Route::get('/create', 'Reads\ArticlesController@create')->name('create');

    Route::get('/{article}', 'Reads\ArticlesController@edit')->name('edit');

    Route::post('', 'Reads\ArticlesController@store')->name('store');

    Route::post('/validate', 'Reads\ArticlesController@checkTitle')->name('lookup');

    Route::patch('/{article}', 'Reads\ArticlesController@update')->name('update');

    Route::patch('/{article}/topics', 'Reads\ArticlesController@updateTopics')->name('update-topics');

    Route::patch('/{article}/image', 'Reads\ArticlesController@updateImage')->name('image.update');
    
    Route::delete('/{article}', 'Reads\ArticlesController@destroy')->name('destroy');

});
