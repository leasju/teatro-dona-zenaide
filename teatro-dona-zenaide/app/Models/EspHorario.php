<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Espetaculo;

class EspHorario extends Model
{
    protected $table = 'horarios';
    public $timestamps = true;
    protected $fillable = [
        'fk_id_esp',
        'fk_id_dia',
        'hora'
    ];

    // Um horário pertence a um dia
    public function dia()
    {
        return $this->belongsTo(EspDia::class);
    }
    public function espetaculos()
    {
        return $this->belongsTo(Espetaculo::class);
    }
}
