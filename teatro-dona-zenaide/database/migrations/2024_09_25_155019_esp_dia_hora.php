<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Criação da tabela associativa que relaciona espetáculos, dias e horários
    public function up(): void
    {
        Schema::create('esp_dia_hora', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_esp'); // FK da tabela espetaculos
            $table->unsignedBigInteger('fk_id_dia'); // FK da tabela dias
            $table->unsignedBigInteger('fk_id_hora'); // FK da tabela horarios

            // Referência pra Espetaculo
            $table->foreign('fk_id_esp')->
                    references('id')->
                    on('espetaculos');
    
            // Referência pra Dias
            $table->foreign('fk_id_dia')->
                    references('id')->
                    on('dias');

            // Referência pra Horarios
            $table->foreign('fk_id_hora')->
                    references('id')->
                    on('horarios');


            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('esp_dia_hora');
    }
    
};
