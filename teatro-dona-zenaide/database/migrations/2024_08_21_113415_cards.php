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
        // Criação da tabela "Cards" no banco de dados
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->text('nome_evento');
            $table->text('artista_evento');
            $table->date('data_evento');
            $table->text('local_evento');
            $table->time('hora_evento');
            $table->text('duracao_evento');
            $table->text('tempo_evento');
            $table->text('img_evento');
            $table->text('desc_evento', 200);
        
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
