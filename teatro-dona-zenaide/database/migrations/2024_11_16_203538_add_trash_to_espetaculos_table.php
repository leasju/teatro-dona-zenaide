<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrashToEspetaculosTable extends Migration
{
    public function up()
    {
        Schema::table('espetaculos', function (Blueprint $table) {
            // Adiciona o campo 'trash' com valores padrão 0 e permite apenas 0 ou 1
            $table->boolean('trash')->default(0);
        });
    }

    public function down()
    {
        Schema::table('espetaculos', function (Blueprint $table) {
            // Remove o campo 'trash' caso a migration seja revertida
            $table->dropColumn('trash');
        });
    }
}
