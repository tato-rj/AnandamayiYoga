<?php

Route::middleware(['auth', 'email-confirmed'])->name('user.')->group(function() {

    getRoutes(['user.course|favorites|me|membership|notifications|routine|settings|update|purchase']);

});
