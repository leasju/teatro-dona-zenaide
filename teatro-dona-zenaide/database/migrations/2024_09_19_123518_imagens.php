<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Criação da tabela "imagens" 
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('espetaculo_id');
            $table->foreign('espetaculo_id')->references('id')->on('espetaculos');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('imagens');
    }
};
