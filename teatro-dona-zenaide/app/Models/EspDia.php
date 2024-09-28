<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspDia extends Model
{
    protected $table = 'dias';
    public $timestamps = true;
    protected $fillable = [
        'fk_id_esp',
        'dia',
    ];

    // Um dia pertence a um espetáculo
    public function espetaculo()
    {
        return $this->belongsTo(Espetaculo::class, 'fk_id_esp');
    }

    // Um dia pode ter muitos horários
    public function horarios()
    {
        return $this->hasMany(EspHorario::class, 'fk_id_dia');
    }
}