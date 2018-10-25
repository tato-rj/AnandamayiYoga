<?php

Route::get('/', function () {

    return view('pages/welcome/index');

})->name('home');
