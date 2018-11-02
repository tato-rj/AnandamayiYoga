<?php

Route::prefix('/office/login')->namespace('Admin')->name('admin.login.')->group(function() {

    Route::get('', 'LoginController@showLoginForm')->name('show');

    Route::post('', 'LoginController@login')->name('submit');

});
