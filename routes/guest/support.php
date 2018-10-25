<?php

Route::prefix('/support')->name('support.')->group(function() {

    Route::get('', function () {
 
        return view('pages/support/index');
 
    })->name('index');

    Route::prefix('/resources')->group(function() {

        Route::get('/getting-started', function () {
 
            return view('pages/support/resources/getting_started/index');
 
        })->name('getting-started');

        Route::get('/membership', function () {
 
            return view('pages/support/resources/membership/index');
 
        })->name('membership');

        Route::get('/profile', function () {
 
            return view('pages/support/resources/profile/index');
 
        })->name('profile');

        Route::get('/privacy-policy', function () {
 
            return view('pages/support/resources/policy/index');
 
        })->name('policy');

        Route::get('/terms-and-conditions', function () {
 
            return view('pages/support/resources/terms/index');
 
        })->name('terms');

        Route::get('/courses', function () {
 
            return view('pages/support/resources/courses/index');
 
        })->name('courses');

        Route::get('/partnership', function () {
 
            return view('pages/support/resources/partnership/index');
 
        })->name('partnership');

        Route::get('/account', function () {
 
            return view('pages/support/resources/account/index');
 
        })->name('account');

        Route::get('/faq', function () {
 
            return view('pages/support/resources/faq/index');
 
        })->name('faq');

    });

    Route::prefix('/contact')->name('contact.')->group(function() {

        Route::get('', function () {
 
            return view('pages/support/contact/index');
 
        })->name('show');

        Route::post('', 'ContactsController@send')->name('send');

    });

});
