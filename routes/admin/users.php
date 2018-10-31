<?php

Route::prefix('/users')->namespace('Admin')->name('users.')->group(function() {

    Route::get('', 'OfficeController@users')->name('index');

    Route::get('/{user}', 'OfficeController@user')->name('show');

    Route::get('/{user}/invoices', 'OfficeController@invoices')->name('invoices');

    Route::delete('/{user}', 'OfficeController@destroyUser')->name('destroy');

});
