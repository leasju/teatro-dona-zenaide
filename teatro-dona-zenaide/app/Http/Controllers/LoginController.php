<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\Login;

class LoginController extends Controller
{
    public function loginAdm(Request $request)
    {
        // Validação dos dados inseridos no forms de login do administrador
        $request->validate([
            'user' => 'required|email',
            'pass' => 'required',
        ]);

        // Busca o usuário no banco de dados
        $ologin = Login::where('adm_user', $request->input('user'))->first();
        
        // Verifica se o usuário existe
        if (!$ologin) {
            // Se o usuário não existe, retorna uma mensagem de erro
            return back()->withErrors(['user' => 'Usuário não encontrado']);
        }

        // Validação da senha inserida de acordo com a registrada no banco de dados
        if ($ologin && Hash::check($request->input('pass'), $ologin->adm_pass)) {

            // Para login válido, redireciona para página de admin
            return redirect('/espetaculos')->with('success', 'Login realizado com sucesso!');
        } else {
            // Para login inválido, retorna uma mensagem de erro
            return back()->withErrors(['pass' => 'Email ou senha inválidos']);
        }
    }
}