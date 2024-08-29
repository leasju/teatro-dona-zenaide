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
            $table->text('nomeEsp'); //Nome do espetáculo
            $table->text('artistaEsp'); // Artista do espetáculo
            $table->date('dataEsp'); // Data do espetáculo
            $table->text('localEsp'); // Local do espetáculo
            $table->time('horaEsp'); // Horário do espetáculo
            $table->text('duracaoEsp'); // Duração do espetáculo
            $table->text('tempoEsp'); // Tempo do espetáculo (min, hora)
            $table->text('imgEsp'); // Imagem do espetáculo
            $table->text('descEsp', 255); // Descrição do espetáculo
        
            //FICHA TÉCNICA
            $table->text('textoEsp'); // Figurino do espetáculo
            $table->text('elencoEsp', 255); // Elenco do espetáculo
            $table->text('direcaoEsp', 255); // Direção do espetáculo
            $table->text('figurinoEsp', 255); // Figurino do espetáculo
            $table->text('cenografiaEsp', 255); // Cenografia do espetáculo
            $table->text('iluminacaoEsp', 255); // Figurino do espetáculo
            $table->text('sonorizacaoEsp', 255); // Figurino do espetáculo

            $table->text('producaoEsp', 255); // Figurino do espetáculo

            
            
            

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
