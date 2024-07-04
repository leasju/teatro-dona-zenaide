<?php

use Illuminate\Support\Facades\Route;

// Rota por GET para a tela home
Route::get('/', function () {
    return view('theatre/home');
});

// Rota por GET para a tela play (apenas por enquanto, futuramente será chamado a view play (peça teatral) preenchida com a peça requisitada de acordo com o card da tela home)
Route::get('/espetaculos', function() {
    return view('theatre/play');
});
