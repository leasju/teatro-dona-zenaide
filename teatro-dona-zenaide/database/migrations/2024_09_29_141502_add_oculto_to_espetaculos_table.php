<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Migration para adicionar o campo "oculto" na tabela espetáculos
    public function up()
    {
    Schema::table('espetaculos', function (Blueprint $table) {
        $table->boolean('oculto')->default(false); 
    });
    }

    public function down()
    {
        Schema::table('espetaculos', function (Blueprint $table) {
            $table->dropColumn('oculto'); // Remove este campo caso a migration seja revertida
        });
    }
};
