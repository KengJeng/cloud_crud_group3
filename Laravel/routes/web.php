<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;

Route::get('/', function () {
    return view('coffees.index');
});


Route::get('/coffees', [CoffeeController::class, 'index'])->name('coffees.index');

Route::get('/coffees/create', [CoffeeController::class, 'create'])->name('coffees.create');


Route::post('/coffees', [CoffeeController::class, 'store'])->name('coffees.store');


Route::get('/coffees/{coffee}', [CoffeeController::class, 'show'])->name('coffees.show');
