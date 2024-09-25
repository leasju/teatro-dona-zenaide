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

            $table->id(); // ID do dia
            $table->date('dia');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dias');
    }
};

