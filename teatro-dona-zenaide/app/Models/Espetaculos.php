<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espetaculos extends Model
{
    use HasFactory;
    protected $table = "espetaculos";

    public function dias()
    {
        return $this->belongsToMany(Dias::class, 'esp_dia_hora') // Busca todas as peças relacionadas a esse dia
                    ->withPivot('horario_id')
                    ->withTimestamps();
    }

    // Imagem do banner
    public function bannerImage()
    {
        return $this->hasMany(Images::class, 'image_id');
    }

    // Imagens do carrossel
    public function carImages()
    {
        return $this->belongsToMany(Images::class, 'espetaculo_imagem');
    }
    
}

/*
belongsToMany =  Indica que a relação entre os models é do tipo "muitos para muitos"
hasMany = Indica que a relação entre Espetáculo e Imagem é de um pra muitos
*/