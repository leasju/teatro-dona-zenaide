<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        // Criação da tabela 'login' no banco de dados
        Schema::create('login', function (Blueprint $table) {
            
            // ID é definido como auto-incremento
            $table->increments('id');
            // Tipo 'unique' não permite mais de um registro de user
            $table->string('adm_user', 255)->unique(); 
            $table->string('adm_pass', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    { 
         Schema::dropIfExists('login');
    }
};
