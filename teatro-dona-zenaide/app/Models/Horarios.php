<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;
    protected $table = "horarios";

    //Criação de uma relação entre o model Horários e o model Espetáculos
    public function espetaculos()
    {
            return $this->belongsToMany(espetaculos::class, 'peca_dia_horario') // Busca todas as peças relacionadas a esse horário
                        ->withPivot('dia_id') // O campo 'dia_id' da tabela de pivot 'esp_dia_hora' deve ser incluído
                        ->withTimestamps();
        }
    }
/*
belongsToMany =  Indica que a relação entre os models é do tipo "muitos para muitos"
*/