<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;

class LoginController extends Controller
{
    // Exibe o formulário de login.
    public function showLoginForm()
    {
        return view('admin.login'); // Retorna a view do formulário de login
    }

    // Login
    public function loginAdm(Request $request)
{
    // Validação dos dados inseridos no formulário de login do administrador
    $request->validate([
        'user' => 'required|email',
        'pass' => 'required',
    ]);

    // Busca o usuário no banco de dados
    $ologin = Login::where('adm_user', $request->input('user'))->first();

    if (!$ologin || !Hash::check($request->input('pass'), $ologin->adm_pass)) {
        return back()->withErrors(['error' => 'Usuário ou senha inválidos']);
    }

    // Autenticar o usuário
    Auth::login($ologin);

    // Redirecionar para a página desejada
    return redirect()->intended('/admin/cards')->with('success', 'Login realizado com sucesso!');
}



    // Logout 
    public function logout(Request $request)
    {
        Auth::logout();
    
        // Limpa a sessão e gera um novo token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Redireciona para a página de login sem dados
        return redirect()->route('login')->withInput([]);
    }
    

}
