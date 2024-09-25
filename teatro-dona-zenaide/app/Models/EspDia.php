<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspDia extends Model
{
    protected $fillable = [
        'fk_espetaculo_id',
        'dia',
    ];

 // Um dia pertence a um espetáculo
    public function espetaculo(): BelongsTo
    {
        return $this->belongsTo(Espetaculo::class);
    }

    // Um dia tem muitos horários
    public function horarios(): HasMany
    {
        return $this->hasMany(EspHorario::class, 'fk_dia_id');
    }
}
