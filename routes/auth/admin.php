<?php

Route::prefix('/office/login')->name('manager.login.')->group(function() {

    Route::get('', 'Manager\LoginController@showLoginForm')->name('show');

    Route::post('', 'Manager\LoginController@login')->name('submit');

});
