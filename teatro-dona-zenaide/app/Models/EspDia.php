<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspDia extends Model
{
    protected $fillable = [
        'espetaculo_id',
        'dia',
    ];

    public function espetaculo(): BelongsTo
    {
        return $this->belongsTo(Espetaculo::class);
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(EspHorario::class);
    }
}
