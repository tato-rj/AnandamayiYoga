<?php

Route::namespace('Users')->prefix('localization')->name('localization.')->group(function() {
	Route::post('', 'LocalizationController@set')->name('set');
});
