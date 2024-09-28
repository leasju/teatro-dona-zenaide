<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
        public function up()
    {
         // Criação da tabela 'dias' no banco de dados
        Schema::create('dias', function (Blueprint $table) {
            // ID do dia
            $table->id(); 
            $table->string('dia');
            // FK para tabela espetaculos
            $table->foreignId('fk_id_esp')->
                    constrained('espetaculos')->
                    onDelete('cascade'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dias');
    }
};

