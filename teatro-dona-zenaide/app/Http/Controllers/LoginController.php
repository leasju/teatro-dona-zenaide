<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


use App\Models\Login;

class LoginController extends Controller
{
    public function loginAdm(Request $request)
    {
        // Verificar se os dados foram recebidos
        Log::info('Dados recebidos: ', $request->all());

        // Validação dos dados inseridos no forms de login do administrador
        $request->validate([
            'user' => 'required|email',
            'pass' => 'required',
        ]);

        // Busca o usuário no banco de dados
        $ologin = Login::where('adm_user', $request->input('user'))->first();

        if (!$ologin) {
            Log::error('Usuário não encontrado');
            return back()->withErrors(['user' => 'Usuário não encontrado']);
        }

        // Validação da senha inserida no forms de acordo com a registrada no banco de dados
        if (Hash::check($request->input('pass'), $ologin->adm_pass)) {
            Log::info('Login bem-sucedido');
            return redirect('/espetaculos')->with('success', 'Login realizado com sucesso!');
            
        } else {
            Log::error('Senha inválida');
            return back()->withErrors(['pass' => 'Senha inválida']);
        }
    }
}
