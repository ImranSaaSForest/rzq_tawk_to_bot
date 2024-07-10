<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['tawk.auth'])->group(function () {
    Route::get('/tawkto', function () {
        return 'Authenticated route for Tawk to Bot';
    });
});