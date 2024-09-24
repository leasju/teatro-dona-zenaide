<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspHorario extends Model
{
    protected $fillable = [
        'fk_espetaculo_dia_id',
        'hora_id',
        'horario',
    ];

    public function espDia(): BelongsTo
    {
        return $this->belongsTo(EspDia::class);
    }
}
