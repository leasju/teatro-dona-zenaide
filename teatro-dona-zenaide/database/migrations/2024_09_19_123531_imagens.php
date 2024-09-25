<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        // Criação da tabela "imagens" 
        Schema::create('imagens', function (Blueprint $table) {
        $table->id('img_id');
        $table->string('img');
        $table->unsignedBigInteger('fk_espetaculo_id');
        $table->boolean('principal')->default(false);


        // FK da tabela "espetaculos"
        $table->foreign('fk_espetaculo_id')->
                references('espetaculo_id')->
                on('espetaculos')->
                onDelete('cascade');

        $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('imagens');
    }
};
