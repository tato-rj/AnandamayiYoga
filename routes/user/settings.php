<?php

Route::namespace('Users')->prefix('/settings')->name('settings.')->group(function() {

    Route::get('/profile', 'SettingsController@profile')->name('profile');

    Route::get('/preferences', 'SettingsController@preferences')->name('preferences');

    Route::get('/membership', 'SettingsController@membership')->name('membership');

    Route::get('/payment', 'SettingsController@payment')->name('payment');

    Route::get('/notifications', 'SettingsController@notifications')->name('notifications');

    Route::get('/invoices', 'SettingsController@invoices')->name('invoices');

    Route::get('/remove', 'SettingsController@remove')->name('remove');
    
});
