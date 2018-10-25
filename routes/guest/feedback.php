<?php

Route::prefix('/feedback')->name('feedback.')->group(function() {

    Route::get('goodbye', function() {

        if (session()->get('user-deleted'))
            return view('pages/user/settings/remove/feedback');

        return view('pages/welcome/index');

    })->name('delete');
    
    Route::post('/store', 'FeedbacksController@store')->name('store')->middleware('throttle:2');

});
