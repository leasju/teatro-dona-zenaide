<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EspetaculoController;
use App\Http\Controllers\ContactController;

// * Views Teatro

// Rota por GET para a tela home
Route::get('/', [EspetaculoController::class, 'showHomePage']);

// Rota por GET para a tela play
Route::get('/espetaculos/{id}', [EspetaculoController::class, 'show']);

// Rota por GET para tela sobre nós
Route::get('/sobre-nos', function () {
    return view('theater/about_us');
});

// Rota por GET para tela seu projeto no teatro
Route::get('/seu-projeto-no-teatro', function () {
    return view('theater/your_theater_project');
});

//Rota para o Fale Conosco
Route::post('/fale-conosco', [ContactController::class, 'sendMessage'])->name('contact.send');



// * Views Administrador

// Rota por GET para tela de Login do Admin
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota por POST para o método "loginAdm" da classe "LoginController"
Route::post('/admin/login', [LoginController::class, 'loginAdm']);

// Rota por GET para o método "logout" da classe "LoginController"
Route::get('/admin/logout', [LoginController::class, 'logout']);

//ROTA PROTEGIDAS POR AUTENTICAÇÂO
Route::middleware('auth')->group(function () {
    // Rota por GET para tela de Cards do Admin
    Route::get('/admin/cards', function () {
        return view('admin/cards');
    });
    // Rota para o método "store" da classe "EspetaculosController" 
    Route::post('/admin/cards', [EspetaculoController::class, 'store']);

    // Rota para o método "index" da classe "EspetaculosController"
    Route::get('/admin/cards', [EspetaculoController::class, 'index']);


    // * Botões de ação da lista de cards cadastrados

    // Rota que retorna os dados do espetáculo para a view de edição
    Route::get('/admin/cards/{id}/editar', [EspetaculoController::class, 'edit']);

    //Rota que edita o espetáculo
    Route::put('/admin/cards/{id}/editar', [EspetaculoController::class, 'update']);

    // Rota para exclusão de espetáculo 
    Route::delete('/espetaculos/{id}/delete', [EspetaculoController::class, 'destroy'])->name('espetaculos.destroy');

    // Rota para atualizar a visibilidade
    Route::put('/espetaculos/{id}/ocultar', [EspetaculoController::class, 'ocultar'])->name('espetaculos.ocultar');
});
