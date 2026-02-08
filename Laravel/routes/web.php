<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;

Route::get('/', function () {
    return view('test');
});

Route::get('/coffees', [CoffeeController::class, 'index']);
