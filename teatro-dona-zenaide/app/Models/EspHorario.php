<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspHorario extends Model
{
    protected $fillable = [
        'espetaculo_dia_id',
        'horario',
    ];

    public function espetaculoDia(): BelongsTo
    {
        return $this->belongsTo(EspDia::class);
    }
}
