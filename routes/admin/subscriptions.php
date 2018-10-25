<?php

Route::prefix('/subscriptions')->name('subscriptions.')->group(function() {

	Route::get('', 'SubscriptionsController@index')->name('index');

	Route::get('/{subscription}', 'SubscriptionsController@edit')->name('edit');

});
