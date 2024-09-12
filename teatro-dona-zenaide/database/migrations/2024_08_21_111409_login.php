<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
           //Criação da tabela "Login" no banco de dados
        Schema::create('login', function (Blueprint $table) {
            
            $table->increments('id'); //ID é definido como auto-incremento
            $table->string('adm_user', 255)->unique(); //Unique usado para evitar que tenha mais de um registro de user
            $table->string('adm_pass', 255);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
         Schema::dropIfExists('login');
    }
};
