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

            $table->id(); // ID do horário
            $table->time('hora');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};
