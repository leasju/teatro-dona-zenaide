<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        // Criação da tabela 'horarios' no banco de dados
        Schema::create('horarios', function (Blueprint $table) {
            // ID do horário
            $table->id(); 
            $table->time('hora');
            // FK para tabela dias
            $table->foreignId('fk_id_dia')->
                    constrained('dias')->
                    onDelete('cascade'); 
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
