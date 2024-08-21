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
            $table->id();
            $table->text('adm_user', 100);
            $table->text('adm_pass', 100);
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
