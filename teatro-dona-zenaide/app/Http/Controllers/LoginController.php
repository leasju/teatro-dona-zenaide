<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Models\Login;

class LoginController extends Controller
{

   
    public function loginAdm(Request $request){

        // Pega valores inseridos no forms Login e armazena nas variáveis de objeto "ologin"
        $ologin = new Login(); // "Login" é a classe

        $ologin->adm_user = $request->user;
        $ologin->adm_pass = $request->pass;

        $ologin->save(); // Salva no banco de dados
        return view('/login/form', ["sucess"=>true]); // Retorna para a view do forms "Login" 

   }

}