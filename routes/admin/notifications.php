<?php

Route::prefix('/notifications')->name('notifications.')->group(function() {

    Route::get('', 'Manager\NotificationsController@index')->name('index');

    Route::post('/mark-read', 'Manager\NotificationsController@markAllRead')->name('read-all');

    Route::post('/{notification}/mark-read', 'Manager\NotificationsController@markRead')->name('read');

    Route::post('/{notification}/mark-unread', 'Manager\NotificationsController@markUnread')->name('unread');

});
