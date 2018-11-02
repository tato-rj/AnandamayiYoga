<?php

Route::prefix('/support')->name('support.')->group(function() {

    Route::get('', 'Guests\PagesController@support')->name('index');

    Route::prefix('/resources')->group(function() {

        Route::get('/getting-started', 'Guests\PagesController@getting_started')->name('getting-started');

        Route::get('/membership', 'Guests\PagesController@membership')->name('membership');

        Route::get('/profile', 'Guests\PagesController@profile')->name('profile');

        Route::get('/privacy-policy', 'Guests\PagesController@privacy')->name('policy');

        Route::get('/terms-and-conditions', 'Guests\PagesController@terms')->name('terms');

        Route::get('/courses', 'Guests\PagesController@courses')->name('courses');

        Route::get('/partnership', 'Guests\PagesController@membership')->name('partnership');

        Route::get('/account', 'Guests\PagesController@account')->name('account');

        Route::get('/faq', 'Guests\PagesController@faq')->name('faq');

    });

    Route::prefix('/contact')->name('contact.')->group(function() {

        Route::get('', 'Guests\PagesController@contact')->name('show');

        Route::post('', 'Emails\ContactsController@send')->name('send');

    });

});
