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

            //OBRIGATÓRIO -------------------------------------------------
            $table->text('nomeEsp'); //Nome do espetáculo
            $table->text('tempEsp'); //Temporada
            $table->date('dataEsp'); // Data do espetáculo
            $table->time('horaEsp'); // Horário do espetáculo
            $table->text('duracaoEsp'); // Duração do espetáculo
            $table->text('tempoEsp'); // Tempo do espetáculo (minutos)
            $table->text('classifEsp'); // Classificação indicatia

            //Imagens
            $table->text('imgCard'); // Imagem do Card 
            $table->text('imgCar_1'); // Imagem 1 - Carrossel 
            $table->text('imgCar_2'); // Imagem 2 - Carrossel 
            $table->text('imgCar_3'); // Imagem 3 - Carrossel 
            $table->text('imgCar_4'); // Imagem 4 - Carrossel 
            $table->text('imgCar_5'); // Imagem 5 - Carrossel 

            $table->text('sinoEsp', 255); // Sinopse do espetáculo
            $table->text('roteiristaEsp', 255); // Roteirista 
            $table->text('elencoEsp', 255); // Elenco do espetáculo
            $table->text('direcaoEsp', 255); // Direção do espetáculo
            $table->text('figurinoEsp', 255); // Figurino do espetáculo
            $table->text('cenoEsp', 255); // Cenografia
            $table->text('luzEsp', 255); // Iluminação
            $table->text('sonoEsp', 255); // Responsável sonorização
            $table->text('produçãoEsp', 255); // Produção do espetáculo



            //OPCIONAL ---------------------------------------------------
           
          
           

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
