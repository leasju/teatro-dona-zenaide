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
        $table->id();;
        $table->string('img');
        $table->boolean('principal')->default(false);
        $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('imagens');
    }
};
