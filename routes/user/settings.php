<?php

Route::prefix('/settings')->name('settings.')->group(function() {

    Route::get('/profile', function() {
        $timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
        $currencies = ['brl' => 'Brazilian Real (R$)', 'eur' => 'European Euro (€)', 'usd' => 'United States Dollar ($)'];
        return view('pages/user/settings/profile/index', compact('timezones', 'currencies'));
    })->name('profile');

    Route::get('/preferences', function() {
        return view('pages/user/settings/preferences/index');
    })->name('preferences');

    Route::get('/membership', function() {
        return view('pages/user/settings/membership/index');
    })->name('membership');

    Route::get('/payment', function() {
        return view('pages/user/settings/payment/index');
    })->name('payment');

    Route::get('/notifications', function() {
        return view('pages/user/settings/notifications/index');
    })->name('notifications');

    Route::get('/invoices', function() {
        $upcomingPayment;

        if (auth()->user()->hasMembership()) {
            $invoice = auth()->user()->membership->upcomingInvoice();
            $upcomingPayment = priceToCurrency($invoice->currency, $invoice->amount_due);
        }
        
        return view('pages/user/settings/invoices/index', compact('upcomingPayment'));
    })->name('invoices');

    Route::get('/remove', function() {
        return view('pages/user/settings/remove/index');
    })->name('remove');
    
});
