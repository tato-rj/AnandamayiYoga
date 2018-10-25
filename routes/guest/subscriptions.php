<?php

Route::prefix('subscriptions')->name('subscriptions.')->group(function() {

    Route::post('/{list}', 'SubscriptionsController@store')->name('store');
    
    Route::delete('/{list}', 'SubscriptionsController@destroy')->name('destroy');

});
