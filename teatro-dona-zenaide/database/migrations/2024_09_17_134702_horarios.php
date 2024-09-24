<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

     // Criação da tabela "Horarios" no banco de dados
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            
            $table->bigIncrements('id'); // ID é definido como auto-incremento
            $table->time('hora'); // Horário do espetáculo
            $table->timestamps();

            });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
