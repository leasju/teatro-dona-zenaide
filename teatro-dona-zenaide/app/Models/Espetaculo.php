<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Espetaculo extends Model
{
    protected $table = 'espetaculos';
    public $timestamps = true;
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
   public function dias()
{
    return $this->hasMany(EspDia::class, 'fk_id_esp');
}
    // Um espetáculo tem várias imagens
public function imagens()
{
    return $this->hasMany(EspImagem::class, 'fk_id_esp');
}

   
}

