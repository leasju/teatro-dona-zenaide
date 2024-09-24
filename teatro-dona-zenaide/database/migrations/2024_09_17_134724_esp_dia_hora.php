<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    // Criação da tabela associativa "esp_dia_hora" no banco de dados
    // esp_dia_hora = espetáculo, dia e horário
    public function up(): void
    {
        Schema::create('esp_dia_hora', function (Blueprint $table) {

            $table->increments('id'); // ID é definido como auto-incremento

            $table->foreignId('esp_id')->constrained('espetaculos')->onDelete('cascade'); // Espetáculo 
            $table->foreignId('dia_id')->constrained('dias')->onDelete('cascade'); // Dia
            $table->foreignId('horario_id')->constrained('horarios')->onDelete('cascade'); // Horário
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esp_dia_hora');
    }
};
