<?php

use Illuminate\Support\Facades\Route;

// Rota por GET para a tela home
Route::get('/', function () {
    return view('theatre/home');
});
