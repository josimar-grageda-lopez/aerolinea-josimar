<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AerolineaController;
use App\Http\Controllers\VueloController;

Route::get('/', function () {
    return redirect()->route('aerolineas.index');
});

Route::resource('aerolineas', AerolineaController::class);
Route::resource('vuelos', VueloController::class);