<?php

Route::prefix('/courses/{course}')->name('course.')->group(function() {

	Route::prefix('/chapters/{chapter}')->name('chapter.')->group(function() {

	    Route::get('/{relationship}/{relationshipId}', 'ChaptersController@show')->name('show');

	    Route::post('/{relationship}/{relationshipId}/answer', 'ChaptersController@submitAnswer')->name('answer.submit');
	
	});

	Route::prefix('/discussions')->middleware('can:view,course')->name('discussion.')->group(function() {

		Route::get('', 'DiscussionsController@index')->name('index');

		Route::prefix('/{discussion}')->group(function() {

			Route::get('', 'DiscussionsController@show')->name('show');

			Route::delete('', 'DiscussionsController@destroy')->name('destroy');

			Route::prefix('/replies')->name('reply.')->group(function() {

				Route::post('', 'RepliesController@store')->name('store');

				Route::delete('/{reply}', 'RepliesController@destroy')->name('destroy');

			});

		});		

		Route::post('', 'DiscussionsController@store')->name('store');

	});

});
