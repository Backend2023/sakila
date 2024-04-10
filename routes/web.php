<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {  //anonimna funkcija, closure
    return view('welcome');
});
*/

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
Route::view('dashboard', 'dashboard')
   // ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::view('dash', 'dashboard')  //uri, view
   // ->middleware(['auth', 'verified']) // koristi auth middleware, samo logirani
    ->name('dashboard'); // svaku rutu je pozeljno imenovati
});
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
