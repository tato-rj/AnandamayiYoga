<?php

Route::middleware('auth:manager')->prefix('/office')->name('admin.')->group(function() {

    Route::get('', 'Admin\OfficeController@index')->name('dashboard');

    getRoutes(['admin.articles|asanas|categories|classes|courses|email|feedbacks|notifications|programs|routines|statistics|subscriptions|teachers|users|wallpapers']);

});
