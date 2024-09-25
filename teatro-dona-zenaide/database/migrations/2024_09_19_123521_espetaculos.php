<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Criação da tabela "Espetaculos" no banco de dados
        Schema::create('espetaculos', function (Blueprint $table) {
            
            $table->id('espetaculo_id'); 

            // INFORMAÇÕES DA PEÇA ------------------------------------------------------------------
            $table->string('nomeEsp', 255); // Nome do espetáculo
            $table->date('tempEsp'); // Temporada do espetáculo
            $table->integer('duracaoEsp'); // Duração do espetáculo
            $table->string('classifEsp', 255); // Classificação indicativa
            $table->text('descEsp'); // Descrição do espetáculo
            $table->text('urlCompra'); // URL de compra de ingresso para o espetáculo 
  
            // (OBRIGATÓRIO) FICHA TÉCNICA  ----------------------------------------------------------
            $table->string('roteiristaEsp', 255); // Roteirista (Responsável pelo texto)
            $table->text('elencoEsp'); // Elenco do espetáculo
            $table->string('direcaoEsp', 255); // Responsável pela direção 
            $table->string('figurinoEsp', 255); // Responsável pelo figurino 
            $table->string('cenoEsp', 255); // Cenografia (Responsável pelo cenário)
            $table->string('luzEsp', 255); // Responsável pela iluminação
            $table->string('sonoEsp', 255); // Responsável pela sonorização
            $table->string('producaoEsp', 255); // Produção do espetáculo
  
            // (OPCIONAL) FICHA TÉCNICA  -------------------------------------------------------------
            $table->string('costEsp', 255); // Costureira do espetáculo
            $table->string('cenoAssistEsp', 255); // Assistente de cenografia
            $table->string('cenoTec', 255); // Cenotécnico do espetáculo
            $table->string('designEsp', 255); // Consultoria de Design do espetáculo
            $table->string('coProducaoEsp', 255); // Co-produção do espetáculo
            $table->text('agradecimentos'); // Agradecimentos
  
            $table->timestamps();  
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('espetaculos');
    }
};
