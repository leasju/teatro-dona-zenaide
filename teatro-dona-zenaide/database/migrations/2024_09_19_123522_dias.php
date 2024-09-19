<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // Criação da tabela 'dias'
        public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->unsignedBigInteger('espetaculo_id');
            $table->foreign('espetaculo_id')->references('id')->on('espetaculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('dias');
    }
};

