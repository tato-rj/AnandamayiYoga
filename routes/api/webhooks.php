<?php

Route::post('/stripe/events', 'Billing\MembershipController@events')->name('stripe.webhooks');
