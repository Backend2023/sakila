<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
Route::get('/', function () {  //anonimna funkcija, closure
    return view('welcome');
});
*/

//Default dir za view je /resources/view
// vraća nam view /resources/view/welcome.blade.php
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

// Primjeri ruta

// /greeting -> anonimnu callback funkciju (closure func ) koja ispisuje neki txt
Route::get('/greeting', function () {
    return 'Hello World';
});
// /user -> poziva kontroller akciju index() koja vraća raw text
Route::get('/user', [UserController::class, 'index']);

// /userjson -> poziva kontroller akciju indexJson() koja vraća JSON 
Route::get('/userjson', [UserController::class, 'indexjson'])->name('test-userjson-rute');

Route::match(['get', 'post'], '/testmatch', function () {
    return 'Hello World iz match rute';
})->name('test-match-rute');

//Invoke-WebRequest -Uri http://localhost:8000/testpost -Method POST
Route::post('/testpost', function () {
    return 'Hello World iz post rute';
})->name('test-post-rute');

//Invoke-WebRequest -Uri http://localhost:8000/testany -Method PUT
Route::any('/testany',  function () {
    return 'Hello World iz any rute';
})->name('test-any-rute');

//TODO napravi csrf primjer forme u viewu

// Redirekcije
Route::redirect('/here', '/there'); //302 temporarily. 
Route::redirect('/hereperm', '/thereperm', 303);
Route::permanentRedirect('/herpermanent', '/therepermanent'); // search engine remember

Route::view('/forma', 'forma')->name('forma');
Route::view('/formatest', 'forma', ['name' => 'Taylor'])->name('forma-test');