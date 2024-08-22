<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
         // Pega valores inseridos no forms Login e armazena nas variáveis de objeto "slogin (Seeder Login)"
        $slogin = new Login();

        $slogin->adm_user = 'jusouzaleandro@gmail.com';

        // Hash sendo usado para armazenar a senha de forma segura
        $slogin->adm_pass = Hash::make('julia123');

         $slogin->save();
    }
}
