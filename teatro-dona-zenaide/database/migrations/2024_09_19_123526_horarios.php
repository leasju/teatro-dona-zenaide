<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Criação da tabela 'horarios'
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {

            $table->id('hora_id'); // ID do horário
            $table->time('hora');
            $table->unsignedBigInteger('fk_dia_id'); // FK da tabela dias


            // FK da tabela "dias"
            $table->foreign('fk_dia_id')->
                    references('dia_id')->
                    on('dias')->
                    onDelete('cascade');
            
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
