<?php

Route::prefix('/teachers')->name('teachers.')->group(function() {

	Route::get('/{teacher}', 'TeachersController@show')->name('show');

});
