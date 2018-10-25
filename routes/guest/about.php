<?php

Route::prefix('/about')->name('about.')->group(function() {

    Route::get('/our-platform', function () {

        return view('pages/about/platform/index');

    })->name('our-platform');

    Route::get('/ali-anandamayi', function () {

        return view('pages/about/anandamayi/index');

    })->name('ali-anandamayi');

    Route::get('/eranthus-books', function () {

        return view('pages/about/eranthus/index');

    })->name('eranthus-books');

});
