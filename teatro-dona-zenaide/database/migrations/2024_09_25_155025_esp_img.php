<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  // Criação da tabela associativa que relaciona espetáculos com imagens
    public function up(): void
    {
        Schema::create('esp_img', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_esp'); // FK da tabela espetaculos
            $table->unsignedBigInteger('fk_id_img'); // FK da tabela dias
     
            // Referência pra Espetaculo
            $table->foreign('fk_id_esp')->
                    references('id')->
                    on('espetaculos');
    
            // Referência pra Dias
            $table->foreign('fk_id_img')->
                    references('id')->
                    on('imagens');

            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('esp_img');
    }
};
