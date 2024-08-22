<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            return redirect()->route('/');
  
        } else {
            // Para login inválido, retorna uma mensagem de erro
            return back()->withErrors(['user' => 'Email ou senha inválidos']);
        }

        // Pega valores inseridos no forms Login e armazena nas variáveis de objeto "ologin"
        $ologin = new Login(); // "Login" é a classe

        $ologin->adm_user = $request->input('user');

        // Hash sendo usado para armazenar a senha de forma segura
        $ologin->adm_pass = Hash::make($request->input('pass'));

        $ologin->save(); // Salva no banco de dados
        
        // Retorna para a view do forms "Login" 
        return view('/admin/login', ["sucess"=>true]); 
      
        

    }

}