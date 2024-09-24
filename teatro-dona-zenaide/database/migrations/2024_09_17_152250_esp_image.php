<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Criação da tabela "esp_images" no banco de dados
    public function up(): void
    {
        Schema::create('espetaculo_image', function (Blueprint $table) {
            $table->id();
            $table->foreignId('esp_id')->constrained('espetaculos')->onDelete('cascade');
            $table->foreignId('image_id')->constrained('images')->onDelete('cascade');
            $table->integer('ordem')->default(1); // Ordem da imagem no carrossel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esp_image');
    }
};
