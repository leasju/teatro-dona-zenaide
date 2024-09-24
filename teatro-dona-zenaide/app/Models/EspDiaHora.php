<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspDiaHora extends Model
{
    use HasFactory;
    protected $table = 'esp_dia_hora';
    protected $fillable = [
        'dia_id',
        'horario_id',
    ];
}
