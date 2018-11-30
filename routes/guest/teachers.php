<?php

Route::prefix('/teachers')->name('teachers.')->group(function() {

	Route::get('/', 'Admin\TeachersController@index')->name('index');

	Route::get('/{teacher}', 'Admin\TeachersController@show')->name('show');

});
