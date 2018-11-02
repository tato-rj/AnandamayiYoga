<?php

Route::prefix('/users')->namespace('Admin')->name('users.')->group(function() {

    Route::get('', 'AdminController@users')->name('index');

    Route::get('/{user}', 'AdminController@user')->name('show');

    Route::get('/{user}/invoices', 'AdminController@invoices')->name('invoices');

    Route::delete('/{user}', 'AdminController@destroyUser')->name('destroy');

});
