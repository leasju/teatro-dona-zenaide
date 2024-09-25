<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\hasManyThrough;
use Illuminate\Database\Eloquent\Model;

class Espetaculo extends Model
{
    protected $fillable = [
        'nomeEsp',
        'tempEsp',
        'duracaoEsp',
        'classifEsp',
        'descEsp',
        'urlCompra',
        'roteiristaEsp',
        'elencoEsp',
        'direcaoEsp',
        'figurinoEsp',
        'cenoEsp',
        'luzEsp',
        'sonoEsp',
        'producaoEsp',
        'costEsp',
        'cenoAssistEsp',
        'cenoTec',
        'designEsp',
        'coProducaoEsp',
        'agradecimentos',
    ];

   // Um espetáculo tem muitos dias
   public function dias(): HasMany
   {
       return $this->hasMany(EspDia::class, 'fk_espetaculo_id');
   }

   // Um espetáculo tem muitos horários através dos dias (indiretamente)
     // Um espetáculo tem muitos horários através de dias
     public function horarios(): HasManyThrough
     {
         return $this->hasManyThrough(
             EspHorario::class, // Modelo final (Horário)
             EspDia::class, // Modelo intermediário (Dia)
             'fk_espetaculo_id', // Chave estrangeira em EspDia
             'fk_dia_id', // Chave estrangeira em EspHorario
             'espetaculo_id', // Chave primária em Espetaculo
             'dia_id' // Chave primária em EspDia
         );
     }

     public function imagens(): HasMany
    {
        return $this->hasMany(EspImagem::class, 'fk_espetaculo_id');
    }

}

