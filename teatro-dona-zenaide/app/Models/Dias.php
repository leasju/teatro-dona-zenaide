<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dias extends Model
{
    use HasFactory;
    protected $table = "dias";

    public function espetaculos()
    {
        return $this->belongsToMany(espetaculos::class, 'esp_dia_hora')
                    ->withPivot('horario_id')
                    ->withTimestamps();
    }

}
/*
belongsToMany =  Indica que a relação entre os models é do tipo "muitos para muitos"
*/