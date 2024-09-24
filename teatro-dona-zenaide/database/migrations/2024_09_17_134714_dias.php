<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Criação da tabela "Dias" no banco de dados
    public function up(): void
    {
        Schema::create('dias', function (Blueprint $table) {
            
            $table->bigIncrements('id'); // ID é definido como auto-incremento
            $table->string('dia'); //dia da semana
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::dropIfExists('dias');
    }
};
