<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {  //anonimna funkcija, closure
    return view('welcome');
});
