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
            $table->text('tempEsp'); //Temporada do espetáculo
            $table->date('dataEsp'); // Data do espetáculo
            $table->text('duracaoEsp'); // Duração do espetáculo
            $table->text('tempoEsp'); // Tempo do espetáculo (minutos)
            $table->text('classifEsp'); // Classificação indicativa
            $table->text('descEsp', 255); // Descrição do espetáculo
            $table->text('roteiristaEsp', 255); // Roteirista do espetáculo
            $table->text('elencoEsp', 255); // Elenco do espetáculo
            $table->text('direcaoEsp', 255); // Responsável pela direção 
            $table->text('figurinoEsp', 255); // Responsável pelo figurino 
            $table->text('cenoEsp', 255); // Cenografia (Responsável pelo cenário)
            $table->text('luzEsp', 255); // Responsável pela iluminação
            $table->text('sonoEsp', 255); // Responsável pela sonorização
            $table->text('produçãoEsp', 255); // Produção do espetáculo
            $table->string('urlCompra'); // URL de compra de ingresso para o espetáculo 

            //Imagens
            $table->text('imgCard'); // Imagem do Card 
            $table->text('imgCar_1'); // Imagem 1 - Carrossel 
            $table->text('imgCar_2'); // Imagem 2 - Carrossel 
            $table->text('imgCar_3'); // Imagem 3 - Carrossel 
            $table->text('imgCar_4'); // Imagem 4 - Carrossel 
            $table->text('imgCar_5'); // Imagem 5 - Carrossel 

            /*Horários
            $table->time('horaEsp_1'); // Horário 1
            $table->time('horaEsp_2'); // Horário 2
            $table->time('horaEsp_3'); // Horário 3
            $table->time('horaEsp_4'); // Horário 4
            $table->time('horaEsp_5'); // Horário 5
            */

            //OPCIONAL ---------------------------------------------------
            $table->text('costEsp', 255); // Costureira do espetáculo
            $table->text('cenoAssistEsp', 255); // Assistente de cenografia
            $table->text('cenoTec', 255); // Cenotécnico do espetáculo
            $table->text('coProdução', 255); // Co-produção do espetáculo
            $table->text('agradecimentos', 255); // Agradecimentos


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
