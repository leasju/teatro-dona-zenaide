<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
   
    public function run()
    {
        // Verifica se o usuário já existe antes de criar um novo
    $slogin = Login::where('adm_user', 'jusouzaleandro@gmail.com')->first();
    if (!$slogin) {

          // Pega valores inseridos no forms Login e armazena nas variáveis de objeto "slogin (Seeder Login)"
        $slogin = new Login();

        $slogin->adm_user = 'jusouzaleandro@gmail.com';

       // Hash sendo usado para armazenar a senha de forma segura (criptografia)
        $slogin->adm_pass = Hash::make('julia123');
        $slogin->save();



        }
    }
}