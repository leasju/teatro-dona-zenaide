<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Models\Login;

class LoginController extends Controller
{

   
    public function loginAdm(Request $request){


        // Validação dos dados inseridos no forms de login do administrador
        $request->validate([
            'user' => 'required|email',
            'pass' => 'required',
        ]);

        
        // Busca o usuário no banco de dados
        $ologin = Login::where('adm_user', $request->input('user'))->first();

        // Validação da senha inserida de acordo com a registrada no banco de dados
        if ($ologin && Hash::check($request->input('pass'), $ologin->adm_pass)) {
            
            // Para login válido, redireciona para página de admin (coloquei a inicial)
            return redirect('/');
  
        } else {
            // Para login inválido, retorna uma mensagem de erro
            return back()->withErrors(['user' => 'Email ou senha inválidos']);
        }


        

    }

}