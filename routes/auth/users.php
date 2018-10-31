<?php

use App\Http\Controllers\Auth\GateController;

// For development only
GateController::auth();

Auth::routes();

Route::prefix('/login')->name('login.')->group(function() {

	Route::post('/record', 'Users\UsersController@recordLogin')->name('record');

	Route::get('/{provider}', 'Auth\SocialiteController@login')->name('social');

});

Route::prefix('/register/confirm')->name('register.confirm.')->group(function() {

	Route::get('', 'Auth\EmailConfirmationController@confirm')->name('show');

	Route::post('', 'Auth\EmailConfirmationController@request')->name('request');

});
