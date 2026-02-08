<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

Route::apiResource('coffees', App\Http\Controllers\CoffeeController::class);