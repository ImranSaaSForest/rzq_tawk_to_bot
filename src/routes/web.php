<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['tawk.auth'])->group(function () {
    Route::get('/tawk-to-bot', function () {
        return 'Authenticated route for Tawk to Bot';
    });
});