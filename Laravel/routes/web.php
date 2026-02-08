<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('test');
});

Route::get('/coffees', function () {
    return view('coffees.index');
});
