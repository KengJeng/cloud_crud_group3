<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;



// Redirect home to coffee list
Route::get('/', function () {
    return redirect()->route('coffees.index');
});

// Show coffee list (view)
Route::get('/coffees', [CoffeeController::class, 'index'])
    ->name('coffees.index');

// Create coffee form
Route::get('/coffees/create', [CoffeeController::class, 'create'])
    ->name('coffees.create');

// Store coffee
Route::post('/coffees', [CoffeeController::class, 'store'])
    ->name('coffees.store');

// Show single coffee
Route::get('/coffees/{coffee}', [CoffeeController::class, 'show'])
    ->name('coffees.show');

// Delete coffee
Route::delete('/coffees/{coffee}', [CoffeeController::class, 'destroy'])
    ->name('coffees.destroy');
