<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EspetaculoController;

// * Views Teatro

// Rota por GET para a tela home
Route::get('/', function () {
    return view('theater/home');
});

// Rota por GET para a tela play (apenas por enquanto, futuramente será chamado a view play (peça teatral) preenchida com a peça requisitada de acordo com o card da tela home)
Route::get('/espetaculos', function() {
    return view('theater/play_info');
});

// Rota por GET para tela sobre nós
Route::get('/sobre-nos', function() {
    return view('theater/about_us');
});

// Rota por GET para tela seu projeto no teatro
Route::get('/seu-projeto-no-teatro', function() {
    return view('theater/your_theater_project');
});

// * Views Administrador

// Rota por GET para tela de Login do Admin
Route::get('/admin/login', function() {
    return view('admin/login');
});

// Rota por GET para tela de Cards do Admin
Route::get('/admin/cards', function() {
    return view('admin/cards');
});

// Rota por POST para o método "login_adm" da classe "LoginController"
Route::post('/admin/login', [LoginController::class,'loginAdm']);

// Rota para o método "store" da classe "EspetaculosController" 
Route::post('/admin/cards', [EspetaculoController::class,'store']);

// Rota para o método "index" da classe "EspetaculosController"
Route::get('/admin/cards', [EspetaculoController::class,'index']);

