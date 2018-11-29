<?php

Route::prefix('/teachers')->name('teachers.')->group(function() {

	Route::get('/{teacher}', 'Admin\TeachersController@show')->name('show');

});
