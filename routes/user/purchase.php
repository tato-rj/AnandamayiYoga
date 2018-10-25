<?php

Route::prefix('/purchase')->name('purchase.')->group(function() {

	Route::post('/purchase/courses/{course}', 'Billing\PurchasesController@course')->name('course');

});
