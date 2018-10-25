<?php

Route::prefix('/membership')->name('membership.')->group(function() {

    Route::post('', 'Billing\MembershipController@store')->name('store');

    Route::delete('', 'Billing\MembershipController@cancel')->name('cancel');

    Route::post('/resume', 'Billing\MembershipController@resume')->name('resume');

});
