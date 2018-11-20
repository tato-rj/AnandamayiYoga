<?php

Route::middleware(['auth:admin', 'en-locale'])->prefix('/admin')->name('admin.')->group(function() {

    Route::get('', 'Admin\AdminController@index')->name('dashboard');

    getRoutes(['admin.articles|asanas|categories|classes|courses|email|feedbacks|notifications|programs|routines|statistics|subscriptions|teachers|users|wallpapers']);

});
