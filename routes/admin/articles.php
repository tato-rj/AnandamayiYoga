<?php

Route::prefix('/articles')->name('articles.')->group(function() {

    Route::prefix('/topics')->name('topics.')->group(function() {

        Route::get('', 'OfficeController@articleTopics')->name('index');

        Route::post('', 'ArticleTopicsController@store')->name('store');

        Route::patch('/{topic}', 'ArticleTopicsController@update')->name('update');

        Route::delete('/{topic}', 'ArticleTopicsController@destroy')->name('destroy');

    });

    Route::get('', 'OfficeController@articles')->name('index');

    Route::get('/create', 'ArticlesController@create')->name('create');

    Route::get('/{article}', 'ArticlesController@edit')->name('edit');

    Route::post('', 'ArticlesController@store')->name('store');

    Route::post('/validate', 'ArticlesController@checkTitle')->name('lookup');

    Route::patch('/{article}', 'ArticlesController@update')->name('update');

    Route::patch('/{article}/topics', 'ArticlesController@updateTopics')->name('update-topics');

    Route::patch('/{article}/image', 'ArticlesController@updateImage')->name('image.update');
    
    Route::delete('/{article}', 'ArticlesController@destroy')->name('destroy');

});
