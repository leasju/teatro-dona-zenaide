<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        // Criação da tabela 'imagens' no banco de dados
        Schema::create('imagens', function (Blueprint $table) {
        // ID da imagem 
        $table->id();;
        $table->string('img');
        $table->boolean('principal')->default(false);
        // FK para tabela 'espetaculos'
        $table->foreignId('fk_id_esp')->
                constrained('espetaculos')->
                onDelete('cascade'); 

        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagens');
    }
};
