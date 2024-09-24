<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
        public function up()
    {
         // Criação da tabela 'dias'
        Schema::create('dias', function (Blueprint $table) {
            $table->id('dia_id');
            $table->date('dia');
            $table->unsignedBigInteger('fk_espetaculo_id');

            // FK da tabela espetáculos
            $table->foreign('fk_espetaculo_id')->
                    references('espetaculo_id')->
                    on('espetaculos');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dias');
    }
};

