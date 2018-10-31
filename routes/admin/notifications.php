<?php

Route::prefix('/notifications')->namespace('Admin')->name('notifications.')->group(function() {

    Route::get('', 'NotificationsController@index')->name('index');

    Route::post('/mark-read', 'NotificationsController@markAllRead')->name('read-all');

    Route::post('/{notification}/mark-read', 'NotificationsController@markRead')->name('read');

    Route::post('/{notification}/mark-unread', 'NotificationsController@markUnread')->name('unread');

});
