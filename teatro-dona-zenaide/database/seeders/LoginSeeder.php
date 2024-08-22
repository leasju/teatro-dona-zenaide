<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Seeder;

class LoginSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $slogin = new LoginSeeder();

        $slogin->email = 'jusouzaleandro@gmail.com';
        $slogin->password = bcrypt('julia123'); // Hashar a senha
        $slogin->save();
    }
}
