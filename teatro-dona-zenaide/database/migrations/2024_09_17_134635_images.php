<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   // Criação da tabela "Images" no banco de dados
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            
            $table->bigIncrements('id'); //ID é definido como auto-incremento
            $table->string('imgCard'); // Imagem do Card (obrigatória)
            $table->string('thumbnail')->nullable(); // Caminho do thumbnail
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }

};

/* FOREIGN KEY
 - foreignId() = método de declaração de chave estrangeira
 - foreignId('peca_id') = cria coluna chamada esp_id com o id da tabela espetáculos
 - constrained('espetaculos') = método que cria uma relação entre a tabela atual e a tabela espetáculos
 - onDelete('cascade') significa que, se a peça correspondente na tabela espetaculos for deletada, todos
   os registros na tabela atual que estão vinculados a essa peça também serão automaticamente deletados
*/ 

// nullable() = não obrigatório