<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'coProduçãoEsp',
        'agradecimentos',
        'fk_dia_id',
        'fk_hora_id'
    ];

    public function dias(): HasMany
    {
        return $this->hasMany(EspDia::class);
    }

    public function imagens(): HasMany
    {
        return $this->hasMany(EspImagem::class);
    }
}

